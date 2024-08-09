<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvatoCookie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'username',
        'password',
        'active',
        'cookie',
        'user_agent',
        'x-csrf-token',
        'x-csrf-token-2',
        'headers',
        'total_downloads',
        'limit_downloads',
    ];
    
}
