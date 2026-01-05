<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopUp;
use App\Models\Game;
use Illuminate\Http\Request;

class TopUpController extends Controller
{
    public function index()
    {
        $topups = TopUp::with('game')->paginate(20);
        return view('admin.topup.index', compact('topups'));
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
