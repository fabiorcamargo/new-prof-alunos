<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cademi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'nome',
        'email',
        'celular',
        'login_auto',
        'gratis',
    ];

    protected $casts = [
        'visible' => 'boolean'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

