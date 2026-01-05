<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\TopUp;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $gamesCount = Game::count();
        $topupsCount = TopUp::count();
        $transactionsCount = Transaction::count();
        $recentTransactions = Transaction::with(['game', 'topup'])->latest()->limit(8)->get();

        return view('admin.dashboard', compact('gamesCount', 'topupsCount', 'transactionsCount', 'recentTransactions'));
    }
}
