<?php

namespace App\Services;

use App\Models\Game;
use App\Models\PromoCode;
use App\Models\TopUp;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Exception;

class TopUpService
{
    /**
     * Memproses transaksi pembelian top-up
     *
     * @param array $data
     * @return Transaction
     * @throws Exception
     */
    public function processPurchase(array $data): Transaction
    {
        return DB::transaction(function () use ($data) {
            try {
                // Validasi game ada
                $game = Game::findOrFail($data['game_id']);
                
                // Validasi top-up ada dan milik game tersebut
                $topup = TopUp::where('id', $data['topup_id'])
                    ->where('game_id', $game->id)
                    ->firstOrFail();

                // Dapatkan user yang sedang login
                $user = auth()->user();

                $originalPrice = (int) $topup->price;
                $discount = 0;
                $appliedPromo = null;

                if (!empty($data['promo_code'])) {
                    $normalizedCode = strtoupper(trim((string) $data['promo_code']));

                    $promo = PromoCode::where('code', $normalizedCode)
                        ->lockForUpdate()
                        ->first();

                    if (!$promo || !$promo->is_active) {
                        throw new Exception('Kode promo tidak valid atau sudah tidak aktif.');
                    }

                    if ($promo->starts_at && now()->lt($promo->starts_at)) {
                        throw new Exception('Kode promo belum bisa digunakan.');
                    }

                    if ($promo->ends_at && now()->gt($promo->ends_at)) {
                        throw new Exception('Kode promo sudah kedaluwarsa.');
                    }

                    if (!is_null($promo->min_purchase) && $originalPrice < (int) $promo->min_purchase) {
                        throw new Exception('Minimal pembelian untuk kode promo ini adalah Rp ' . number_format((int) $promo->min_purchase, 0, ',', '.') . '.');
                    }

                    if (!is_null($promo->usage_limit) && (int) $promo->used_count >= (int) $promo->usage_limit) {
                        throw new Exception('Kuota penggunaan kode promo sudah habis.');
                    }

                    if ($promo->type === PromoCode::TYPE_PERCENT) {
                        $discount = (int) floor($originalPrice * ((int) $promo->value) / 100);
                    } elseif ($promo->type === PromoCode::TYPE_FIXED) {
                        $discount = (int) $promo->value;
                    } else {
                        throw new Exception('Tipe kode promo tidak dikenali.');
                    }

                    if (!is_null($promo->max_discount)) {
                        $discount = min($discount, (int) $promo->max_discount);
                    }

                    $discount = max(0, min($discount, $originalPrice));

                    // Reserve 1 usage
                    $promo->increment('used_count');
                    $appliedPromo = $promo;
                }

                $finalPrice = max(0, $originalPrice - $discount);
                
                // Validasi saldo mencukupi
                if (!$user->hasSufficientBalance($finalPrice)) {
                    throw new Exception('Saldo tidak mencukupi. Silakan top up saldo terlebih dahulu.');
                }

                // Kurangi saldo user
                $user->deductBalance($finalPrice);

                // Buat transaksi baru
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'game_id' => $game->id,
                    'topup_id' => $topup->id,
                    'amount' => $topup->amount,
                    'original_price' => $originalPrice,
                    'discount' => $discount,
                    'price' => $finalPrice,
                    'status' => Transaction::STATUS_PENDING,
                    'game_account' => $data['game_account'],
                    'promo_code_id' => $appliedPromo?->id,
                    'promo_code' => $appliedPromo?->code,
                ]);

                // TODO: Integrasikan dengan payment gateway di sini
                // Untuk sekarang, tandai sebagai sukses
                $transaction->update(['status' => Transaction::STATUS_SUCCESS]);

                return $transaction;
            } catch (Exception $e) {
                throw new Exception('Gagal memproses top-up: ' . $e->getMessage());
            }
        });
    }

    /**
     * Dapatkan transaksi pengguna dengan limit
     *
     * @param int $userId
     * @param int $limit
     * @return mixed
     */
    public function getUserTransactions(int $userId, int $limit = 5)
    {
        return Transaction::where('user_id', $userId)
            ->with(['game', 'topup'])
            ->latest()
            ->take($limit)
            ->get();
    }
}
