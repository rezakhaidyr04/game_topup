<?php

// Quick verification script
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = \Illuminate\Http\Request::capture()
);

// Boot the application
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Game TopUp Database Verification ===\n\n";

// Check Games
$games = \App\Models\Game::with('topups')->get();
echo "Games Available: " . count($games) . "\n\n";

foreach($games as $game) {
    echo "📱 " . $game->name . "\n";
    echo "   Currency: " . $game->currency_type . "\n";
    echo "   Packages: " . $game->topups->count() . "\n";
    foreach($game->topups->take(3) as $topup) {
        echo "   - " . $topup->name . " (Rp " . number_format($topup->price, 0, ',', '.') . ")\n";
    }
    if($game->topups->count() > 3) {
        echo "   ... and " . ($game->topups->count() - 3) . " more\n";
    }
    echo "\n";
}

echo "=== Database Ready for Presentation! ===\n";
