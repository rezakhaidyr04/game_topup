<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\TopUp;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopUpController extends Controller
{
    public function index()
    {
        $games = Game::with('topups')->get();
        $userTransactions = Transaction::where('user_id', Auth::id())
            ->with('game', 'topup')
            ->latest()
            ->take(5)
            ->get();
        
        return view('topup.index', compact('games', 'userTransactions'));
    }

    public function show(Game $game)
    {
        $topups = $game->topups;
        return view('topup.show', compact('game', 'topups'));
    }

    public function purchase(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'topup_id' => 'required|exists:top_ups,id',
            'game_account' => 'required|string',
        ]);

        $topup = TopUp::find($validated['topup_id']);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'game_id' => $validated['game_id'],
            'topup_id' => $validated['topup_id'],
            'amount' => $topup->amount,
            'price' => $topup->price,
            'status' => 'success',
            'game_account' => $validated['game_account'],
        ]);

        return redirect()->route('topup.receipt', $transaction)->with('success', 'Top-up berhasil!');
    }

    public function receipt(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            return redirect()->route('home');
        }

        return view('topup.receipt', compact('transaction'));
    }
}
