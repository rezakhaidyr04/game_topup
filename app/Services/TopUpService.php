<?php

namespace App\Services;

use App\Models\Game;
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

                // Buat transaksi baru
                $transaction = Transaction::create([
                    'user_id' => auth()->id(),
                    'game_id' => $game->id,
                    'topup_id' => $topup->id,
                    'amount' => $topup->amount,
                    'price' => $topup->price,
                    'status' => Transaction::STATUS_PENDING,
                    'game_account' => $data['game_account'],
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
