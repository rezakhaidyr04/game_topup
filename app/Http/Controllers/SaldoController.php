<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SaldoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('saldo.index', compact('user'));
    }

    public function topup(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000|max:10000000',
        ]);

        $amount = $request->amount;
        
        // Generate QRIS code (simulasi)
        $qrisCode = $this->generateQRIS($amount);
        
        return view('saldo.qris', [
            'amount' => $amount,
            'qrisCode' => $qrisCode,
            'transactionId' => Str::random(16),
        ]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required',
            'amount' => 'required|numeric',
        ]);

        // Simulasi pembayaran berhasil
        $user = Auth::user();
        $user->addBalance($request->amount);

        return redirect()->route('saldo.index')->with('success', 'Top up berhasil! Saldo Anda telah ditambahkan.');
    }

    private function generateQRIS($amount)
    {
        // Ini adalah simulasi QRIS
        // Dalam implementasi nyata, Anda perlu integrasi dengan payment gateway seperti:
        // - Midtrans
        // - Xendit
        // - DOKU
        // - dll
        
        $qrisData = [
            'merchant' => 'GameTopup',
            'amount' => $amount,
            'reference' => Str::random(20),
        ];

        return base64_encode(json_encode($qrisData));
    }
}
