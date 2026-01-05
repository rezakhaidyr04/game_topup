<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopUp;
use App\Models\Game;
use Illuminate\Http\Request;

class TopUpController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::all();

        $query = TopUp::with('game');

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($s) use ($q) {
                $s->where('name', 'like', "%{$q}%")
                  ->orWhere('amount', 'like', "%{$q}%")
                  ->orWhereHas('game', function($g) use ($q){
                      $g->where('name', 'like', "%{$q}%");
                  });
            });
        }

        if ($request->filled('game_id')) {
            $query->where('game_id', $request->game_id);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $topups = $query->orderBy('created_at', 'desc')->paginate(20)->appends($request->query());

        return view('admin.topup.index', compact('topups', 'games'));
    }

    public function create()
    {
        $games = Game::all();
        return view('admin.topup.create', compact('games'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string|max:255',
            'amount' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        TopUp::create($data);

        return redirect()->route('admin.topups.index')->with('success', 'TopUp paket berhasil dibuat');
    }

    public function edit(TopUp $topup)
    {
        $games = Game::all();
        return view('admin.topup.edit', compact('topup', 'games'));
    }

    public function update(Request $request, TopUp $topup)
    {
        $data = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string|max:255',
            'amount' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $topup->update($data);

        return redirect()->route('admin.topups.index')->with('success', 'TopUp paket berhasil diperbarui');
    }

    public function destroy(TopUp $topup)
    {
        $topup->delete();
        return redirect()->route('admin.topups.index')->with('success', 'TopUp paket berhasil dihapus');
    }
}
