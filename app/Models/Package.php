<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'per_day_download',
    ];
    
    public function items()
    {
        return $this->hasMany(PackageItem::class);
    }
    
    static function boot()
    {
        parent::boot();
        static::deleting(function($package) {
            $package->items()->delete();
        });
    }
}
