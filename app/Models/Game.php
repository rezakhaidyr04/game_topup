<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'icon', 'currency_type', 'min_price', 'max_price'];

    public function topups()
    {
        return $this->hasMany(TopUp::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
