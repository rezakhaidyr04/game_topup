<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\TopUp;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        // Mobile Legends
        $mlGame = Game::updateOrCreate(
            ['name' => 'Mobile Legends'],
            [
                'icon' => '🔥',
                'currency_type' => 'Diamond',
                'min_price' => 10000,
                'max_price' => 1000000,
            ]
        );

        TopUp::updateOrCreate(['game_id' => $mlGame->id, 'name' => '8 Diamond'], ['amount' => 8, 'price' => 10000]);
        TopUp::updateOrCreate(['game_id' => $mlGame->id, 'name' => '20 Diamond'], ['amount' => 20, 'price' => 20000]);
        TopUp::updateOrCreate(['game_id' => $mlGame->id, 'name' => '50 Diamond'], ['amount' => 50, 'price' => 50000]);
        TopUp::updateOrCreate(['game_id' => $mlGame->id, 'name' => '100 Diamond'], ['amount' => 100, 'price' => 99000]);
        TopUp::updateOrCreate(['game_id' => $mlGame->id, 'name' => '250 Diamond'], ['amount' => 250, 'price' => 249000]);
        TopUp::updateOrCreate(['game_id' => $mlGame->id, 'name' => '500 Diamond'], ['amount' => 500, 'price' => 499000]);

        // PUBG Mobile
        $pubgGame = Game::updateOrCreate(
            ['name' => 'PUBG Mobile'],
            [
                'icon' => '⚔️',
                'currency_type' => 'UC',
                'min_price' => 15000,
                'max_price' => 1000000,
            ]
        );

        TopUp::updateOrCreate(['game_id' => $pubgGame->id, 'name' => '18 UC'], ['amount' => 18, 'price' => 15000]);
        TopUp::updateOrCreate(['game_id' => $pubgGame->id, 'name' => '45 UC'], ['amount' => 45, 'price' => 35000]);
        TopUp::updateOrCreate(['game_id' => $pubgGame->id, 'name' => '125 UC'], ['amount' => 125, 'price' => 100000]);
        TopUp::updateOrCreate(['game_id' => $pubgGame->id, 'name' => '250 UC'], ['amount' => 250, 'price' => 200000]);
        TopUp::updateOrCreate(['game_id' => $pubgGame->id, 'name' => '500 UC'], ['amount' => 500, 'price' => 399000]);

        // Free Fire
        $ffGame = Game::updateOrCreate(
            ['name' => 'Free Fire'],
            [
                'icon' => '🎮',
                'currency_type' => 'Diamond',
                'min_price' => 5000,
                'max_price' => 500000,
            ]
        );

        TopUp::updateOrCreate(['game_id' => $ffGame->id, 'name' => '5 Diamond'], ['amount' => 5, 'price' => 5000]);
        TopUp::updateOrCreate(['game_id' => $ffGame->id, 'name' => '10 Diamond'], ['amount' => 10, 'price' => 10000]);
        TopUp::updateOrCreate(['game_id' => $ffGame->id, 'name' => '50 Diamond'], ['amount' => 50, 'price' => 50000]);
        TopUp::updateOrCreate(['game_id' => $ffGame->id, 'name' => '100 Diamond'], ['amount' => 100, 'price' => 99000]);
        TopUp::updateOrCreate(['game_id' => $ffGame->id, 'name' => '210 Diamond'], ['amount' => 210, 'price' => 199000]);

        // Call of Duty Mobile
        $codGame = Game::updateOrCreate(
            ['name' => 'Call of Duty Mobile'],
            [
                'icon' => '👾',
                'currency_type' => 'CP',
                'min_price' => 25000,
                'max_price' => 1000000,
            ]
        );

        TopUp::updateOrCreate(['game_id' => $codGame->id, 'name' => '30 CP'], ['amount' => 30, 'price' => 25000]);
        TopUp::updateOrCreate(['game_id' => $codGame->id, 'name' => '100 CP'], ['amount' => 100, 'price' => 75000]);
        TopUp::updateOrCreate(['game_id' => $codGame->id, 'name' => '250 CP'], ['amount' => 250, 'price' => 199000]);
        TopUp::updateOrCreate(['game_id' => $codGame->id, 'name' => '500 CP'], ['amount' => 500, 'price' => 399000]);

        // Valorant
        $valGame = Game::updateOrCreate(
            ['name' => 'Valorant'],
            [
                'icon' => '🌟',
                'currency_type' => 'VP',
                'min_price' => 50000,
                'max_price' => 2000000,
            ]
        );

        TopUp::updateOrCreate(['game_id' => $valGame->id, 'name' => '475 VP'], ['amount' => 475, 'price' => 50000]);
        TopUp::updateOrCreate(['game_id' => $valGame->id, 'name' => '1000 VP'], ['amount' => 1000, 'price' => 100000]);
        TopUp::updateOrCreate(['game_id' => $valGame->id, 'name' => '2000 VP'], ['amount' => 2000, 'price' => 200000]);
        TopUp::updateOrCreate(['game_id' => $valGame->id, 'name' => '5000 VP'], ['amount' => 5000, 'price' => 499000]);

        // Genshin Impact
        $genshinGame = Game::updateOrCreate(
            ['name' => 'Genshin Impact'],
            [
                'icon' => '💎',
                'currency_type' => 'Primogems',
                'min_price' => 40000,
                'max_price' => 2000000,
            ]
        );

        TopUp::updateOrCreate(['game_id' => $genshinGame->id, 'name' => '80 Primogems'], ['amount' => 80, 'price' => 40000]);
        TopUp::updateOrCreate(['game_id' => $genshinGame->id, 'name' => '180 Primogems'], ['amount' => 180, 'price' => 85000]);
        TopUp::updateOrCreate(['game_id' => $genshinGame->id, 'name' => '300 Primogems'], ['amount' => 300, 'price' => 150000]);
        TopUp::updateOrCreate(['game_id' => $genshinGame->id, 'name' => '980 Primogems'], ['amount' => 980, 'price' => 499000]);
    }
}
