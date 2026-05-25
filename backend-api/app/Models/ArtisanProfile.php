<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtisanProfile extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'specialty',
        'description',
        'avatar',
        'cover_photo',
        'rating',
        'review_count',
        'is_certified',
        'experience_years',
        'availability',
        'busy_until',
        'busy_days',
        'lat',
        'lng',
        'distance_km',
    ];

    protected $casts = [
        'is_certified' => 'boolean',
        'rating' => 'decimal:2',
        'lat' => 'decimal:7',
        'lng' => 'decimal:7',
        'busy_days' => 'array',
    ];

    /**
     * The user that owns this artisan profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The category this artisan belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the services offered by this artisan.
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get the skills of this artisan.
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Get the portfolio items of this artisan.
     */
    public function portfolioItems()
    {
        return $this->hasMany(PortfolioItem::class);
    }

    /**
     * Get the reviews for this artisan.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
