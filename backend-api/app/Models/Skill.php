<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['artisan_profile_id', 'name', 'percentage'];

    public function artisanProfile()
    {
        return $this->belongsTo(ArtisanProfile::class);
    }
}
