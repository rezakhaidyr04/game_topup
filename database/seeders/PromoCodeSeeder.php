<?php

namespace Database\Seeders;

use App\Models\PromoCode;
use Illuminate\Database\Seeder;

class PromoCodeSeeder extends Seeder
{
    public function run(): void
    {
        PromoCode::updateOrCreate(
            ['code' => 'HEMAT10'],
            [
                'type' => PromoCode::TYPE_PERCENT,
                'value' => 10,
                'min_purchase' => 0,
                'max_discount' => 20000,
                'starts_at' => now()->subDay(),
                'ends_at' => now()->addMonths(3),
                'usage_limit' => null,
                'used_count' => 0,
                'is_active' => true,
            ]
        );

        PromoCode::updateOrCreate(
            ['code' => 'POTONG5000'],
            [
                'type' => PromoCode::TYPE_FIXED,
                'value' => 5000,
                'min_purchase' => 20000,
                'max_discount' => null,
                'starts_at' => now()->subDay(),
                'ends_at' => now()->addMonths(3),
                'usage_limit' => 100,
                'used_count' => 0,
                'is_active' => true,
            ]
        );
    }
}
