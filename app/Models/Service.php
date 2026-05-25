<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['artisan_profile_id', 'name', 'price_range', 'description'];

    public function artisanProfile()
    {
        return $this->belongsTo(ArtisanProfile::class);
    }
}
