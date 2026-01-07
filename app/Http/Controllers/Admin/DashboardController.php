<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\TopUp;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function recap()
    {
        // Data Mingguan
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $weeklyTransactions = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('status', 'completed')
            ->get();

        $weeklyTotalTransactions = $weeklyTransactions->count();
        $weeklyTotalRevenue = $weeklyTransactions->sum('price');

        $weeklyDailyStats = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('status', 'completed')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(price) as revenue')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $weeklyTopGames = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('status', 'completed')
            ->select('game_id', DB::raw('COUNT(*) as count'), DB::raw('SUM(price) as revenue'))
            ->groupBy('game_id')
            ->orderByDesc('count')
            ->limit(5)
            ->with('game')
            ->get();

        // Data Bulanan
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $monthlyTransactions = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'completed')
            ->get();

        $monthlyTotalTransactions = $monthlyTransactions->count();
        $monthlyTotalRevenue = $monthlyTransactions->sum('price');

        $monthlyDailyStats = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'completed')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(price) as revenue')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $monthlyTopGames = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'completed')
            ->select('game_id', DB::raw('COUNT(*) as count'), DB::raw('SUM(price) as revenue'))
            ->groupBy('game_id')
            ->orderByDesc('count')
            ->limit(10)
            ->with('game')
            ->get();

        $monthlyStatusStats = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        return view('admin.recap.index', compact(
            'startOfWeek', 'endOfWeek', 'weeklyTotalTransactions', 'weeklyTotalRevenue', 
            'weeklyDailyStats', 'weeklyTopGames',
            'startOfMonth', 'endOfMonth', 'monthlyTotalTransactions', 'monthlyTotalRevenue',
            'monthlyDailyStats', 'monthlyTopGames', 'monthlyStatusStats'
        ));
    }

    public function weeklyRecap()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Total transaksi minggu ini
        $weeklyTransactions = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('status', 'completed')
            ->get();

        $totalTransactions = $weeklyTransactions->count();
        $totalRevenue = $weeklyTransactions->sum('price');

        // Transaksi per hari dalam minggu
        $dailyStats = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('status', 'completed')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(price) as revenue')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Top games minggu ini
        $topGames = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('status', 'completed')
            ->select('game_id', DB::raw('COUNT(*) as count'), DB::raw('SUM(price) as revenue'))
            ->groupBy('game_id')
            ->orderByDesc('count')
            ->limit(5)
            ->with('game')
            ->get();

        // Transaksi terbaru minggu ini
        $recentTransactions = Transaction::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->with(['game', 'topup', 'user'])
            ->latest()
            ->limit(10)
            ->get();

        return view('admin.recap.weekly', compact(
            'startOfWeek',
            'endOfWeek',
            'totalTransactions',
            'totalRevenue',
            'dailyStats',
            'topGames',
            'recentTransactions'
        ));
    }

    public function monthlyRecap()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Total transaksi bulan ini
        $monthlyTransactions = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'completed')
            ->get();

        $totalTransactions = $monthlyTransactions->count();
        $totalRevenue = $monthlyTransactions->sum('price');

        // Transaksi per minggu dalam bulan
        $weeklyStats = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'completed')
            ->select(
                DB::raw('WEEK(created_at, 1) as week'),
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(price) as revenue')
            )
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        // Transaksi per hari dalam bulan
        $dailyStats = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'completed')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(price) as revenue')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Top games bulan ini
        $topGames = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'completed')
            ->select('game_id', DB::raw('COUNT(*) as count'), DB::raw('SUM(price) as revenue'))
            ->groupBy('game_id')
            ->orderByDesc('count')
            ->limit(10)
            ->with('game')
            ->get();

        // Status transaksi bulan ini
        $statusStats = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        // Transaksi terbaru bulan ini
        $recentTransactions = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->with(['game', 'topup', 'user'])
            ->latest()
            ->limit(15)
            ->get();

        return view('admin.recap.monthly', compact(
            'startOfMonth',
            'endOfMonth',
            'totalTransactions',
            'totalRevenue',
            'weeklyStats',
            'dailyStats',
            'topGames',
            'statusStats',
            'recentTransactions'
        ));
    }
}
