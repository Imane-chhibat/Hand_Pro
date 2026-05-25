<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = ['artisan_profile_id', 'url', 'caption'];

    public function artisanProfile()
    {
        return $this->belongsTo(ArtisanProfile::class);
    }
}
