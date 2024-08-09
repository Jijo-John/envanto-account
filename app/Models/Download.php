<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'file_name',
        'type',
        'next_download',
    ];
    
    protected $casts = [
        'next_download' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function scopeDownload($query, $user)
    {
        return $query->where('user_id', $user->id)
            ->where('next_download', '<=', now());
    }
    
    public function scopeSubscribed($query, $user)
    {
        return $query->where('user_id', $user->id)
        ->whereHas('user', function($query) {
            $query->where('subscription_end', '>=', now());
        });
    }
}
