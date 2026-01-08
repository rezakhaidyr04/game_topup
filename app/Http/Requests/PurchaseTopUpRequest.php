<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseTopUpRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'game_id' => 'required|integer|exists:games,id',
            'topup_id' => 'required|integer|exists:top_ups,id',
            'game_account' => 'required|string|min:1|max:255',
            'promo_code' => 'nullable|string|min:1|max:50',
        ];
    }

    public function messages()
    {
        return [
            'game_id.required' => 'Game harus dipilih',
            'game_id.exists' => 'Game tidak ditemukan',
            'topup_id.required' => 'Paket top-up harus dipilih',
            'topup_id.exists' => 'Paket top-up tidak ditemukan',
            'game_account.required' => 'Akun game harus diisi',
            'game_account.min' => 'Akun game minimal 1 karakter',
            'game_account.max' => 'Akun game maksimal 255 karakter',
            'promo_code.max' => 'Kode promo maksimal 50 karakter',
        ];
    }
}
