<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subscription_start',
        'subscription_end',
        'payment_id',
        'payment_status',
        'status',
        'package_id',
    ];
    
    protected $dates = [
        'subscription_start',
        'subscription_end',
    ];
    
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
