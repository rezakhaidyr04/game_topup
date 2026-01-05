<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Tambah saldo user
     *
     * @param float $amount
     * @return bool
     */
    public function addBalance(float $amount): bool
    {
        $this->balance += $amount;
        return $this->save();
    }

    /**
     * Kurangi saldo user
     *
     * @param float $amount
     * @return bool
     * @throws \Exception
     */
    public function deductBalance(float $amount): bool
    {
        if ($this->balance < $amount) {
            throw new \Exception('Saldo tidak mencukupi');
        }
        
        $this->balance -= $amount;
        return $this->save();
    }

    /**
     * Cek apakah saldo mencukupi
     *
     * @param float $amount
     * @return bool
     */
    public function hasSufficientBalance(float $amount): bool
    {
        return $this->balance >= $amount;
    }
}
