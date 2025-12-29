<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use App\Http\Requests\PurchaseTopUpRequest;
use App\Services\TopUpService;
use Illuminate\Support\Facades\Auth;
use Exception;

class TopUpController extends Controller
{
    private TopUpService $topUpService;

    public function __construct(TopUpService $topUpService)
    {
        $this->topUpService = $topUpService;
    }

    public function index()
    {
        $games = Game::with('topups')->get();
        $userTransactions = $this->topUpService->getUserTransactions(Auth::id());
        
        return view('topup.index', compact('games', 'userTransactions'));
    }

    public function show(Game $game)
    {
        $topups = $game->topups;
        return view('topup.show', compact('game', 'topups'));
    }

    public function purchase(PurchaseTopUpRequest $request)
    {
        try {
            $transaction = $this->topUpService->processPurchase($request->validated());
            return redirect()->route('topup.receipt', $transaction)->with('success', 'Top-up berhasil!');
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function receipt(Transaction $transaction)
    {
        $this->authorize('view', $transaction);
        return view('topup.receipt', compact('transaction'));
    }
}
