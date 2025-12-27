<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'game_id', 'topup_id', 'amount', 'price', 'status', 'game_account'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function topup()
    {
        return $this->belongsTo(TopUp::class);
    }
}
