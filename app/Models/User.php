<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'phone_verified_at',
        'type',
        'google_id',
        'fcmtoken',
        'last_online_at',
        'subscription_start',
        'subscription_end',
        'per_day_download',
        'state',
        'city',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    
    protected $dates = [
        'last_online_at',
        'subscription_start',
        'subscription_end',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
        'last_online_at_for_humans',
        'is_online',
    ];
    
    public function getLastOnlineAtForHumansAttribute()
    {
        return \Carbon\Carbon::parse($this->last_online_at)->diffForHumans();
    }
    
    public function getIsOnlineAttribute()
    {
        return \Carbon\Carbon::parse($this->last_online_at)->diffInMinutes() < 5;
    }
    
    static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->per_day_download = 30;
        });
    }
    public function downloads()
    {
        return $this->hasMany(Download::class);
    }
    
    public function purchases()
    {
        return $this->hasMany(Purchase::class)->latest();
    }
    
    public function scopeSubscribed($query)
    {
        return $query->where('subscription_end', '>=', now());
    }
}
