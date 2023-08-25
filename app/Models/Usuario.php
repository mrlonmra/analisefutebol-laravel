<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use Notifiable, HasFactory;
    
    protected $fillable = [
        'nome',
        'email',
        'password',
    ];
}
