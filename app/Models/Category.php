<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['slug', 'name', 'icon_name'];

    /**
     * Get all artisan profiles in this category.
     */
    public function artisanProfiles()
    {
        return $this->hasMany(ArtisanProfile::class);
    }
}
