<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\PromoCode;
use App\Models\TopUp;
use App\Models\User;
use App\Services\TopUpService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PromoCodePurchaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_purchase_applies_percent_promo_code_discount(): void
    {
        $user = User::factory()->create([
            'balance' => 100_000,
        ]);

        $game = Game::create([
            'name' => 'Test Game',
            'icon' => '🎮',
            'currency_type' => 'Diamond',
            'min_price' => 1,
            'max_price' => 1_000_000,
        ]);

        $topup = TopUp::create([
            'game_id' => $game->id,
            'name' => 'Paket 1',
            'amount' => 100,
            'price' => 50_000,
        ]);

        PromoCode::create([
            'code' => 'HEMAT10',
            'type' => PromoCode::TYPE_PERCENT,
            'value' => 10,
            'is_active' => true,
        ]);

        $this->actingAs($user);

        $service = app(TopUpService::class);
        $tx = $service->processPurchase([
            'game_id' => $game->id,
            'topup_id' => $topup->id,
            'game_account' => 'player123',
            'promo_code' => 'hemat10',
        ]);

        $tx->refresh();
        $user->refresh();

        $this->assertSame(50_000, $tx->original_price);
        $this->assertSame(5_000, $tx->discount);
        $this->assertSame(45_000, $tx->price);
        $this->assertSame('HEMAT10', $tx->promo_code);
        $this->assertSame('success', $tx->status);
        $this->assertSame(55_000.0, (float) $user->balance);
    }
}
