<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function index(Request $request)
    {
        $query = PromoCode::query();

        if ($request->filled('q')) {
            $q = trim((string) $request->q);
            $query->where(function ($s) use ($q) {
                $s->where('code', 'like', "%{$q}%")
                    ->orWhere('type', 'like', "%{$q}%");
            });
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', (bool) $request->boolean('is_active'));
        }

        $promoCodes = $query->orderByDesc('created_at')
            ->paginate(20)
            ->appends($request->query());

        return view('admin.promocodes.index', compact('promoCodes'));
    }

    public function create()
    {
        return view('admin.promocodes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:50|unique:promo_codes,code',
            'type' => 'required|in:percent,fixed',
            'value' => 'required|integer|min:1',
            'min_purchase' => 'nullable|integer|min:0',
            'max_discount' => 'nullable|integer|min:0',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
            'usage_limit' => 'nullable|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        $data['code'] = strtoupper(trim($data['code']));
        $data['is_active'] = $request->boolean('is_active');
        $data['used_count'] = 0;

        PromoCode::create($data);

        return redirect()->route('admin.promocodes.index')->with('success', 'Kode promo berhasil dibuat');
    }

    public function edit(PromoCode $promocode)
    {
        return view('admin.promocodes.edit', ['promoCode' => $promocode]);
    }

    public function update(Request $request, PromoCode $promocode)
    {
        $data = $request->validate([
            'code' => 'required|string|max:50|unique:promo_codes,code,' . $promocode->id,
            'type' => 'required|in:percent,fixed',
            'value' => 'required|integer|min:1',
            'min_purchase' => 'nullable|integer|min:0',
            'max_discount' => 'nullable|integer|min:0',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
            'usage_limit' => 'nullable|integer|min:1',
            'used_count' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['code'] = strtoupper(trim($data['code']));
        $data['is_active'] = $request->boolean('is_active');

        $promocode->update($data);

        return redirect()->route('admin.promocodes.index')->with('success', 'Kode promo berhasil diperbarui');
    }

    public function destroy(PromoCode $promocode)
    {
        $promocode->delete();
        return redirect()->route('admin.promocodes.index')->with('success', 'Kode promo berhasil dihapus');
    }
}
