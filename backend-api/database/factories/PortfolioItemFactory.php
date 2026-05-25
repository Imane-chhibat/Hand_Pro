<?php

namespace Database\Factories;

use App\Models\PortfolioItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioItemFactory extends Factory
{
    protected $model = PortfolioItem::class;

    private const IMAGES = [
        'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1531835551805-16d864c8d311?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=600&q=80',
    ];

    private const CAPTIONS = [
        'Porte sculptée en bois de cèdre', 'Tableau électrique centralisé',
        'Salle de bain en marbre', 'Fontaine en zellige', 'Baie vitrée moderne',
        'Mur en Stucco nacré', 'Portail en fer forgé', 'Plafond suspendu',
        'Hammam en tadelakt', 'Chantier installation solaire',
    ];

    public function definition(): array
    {
        return [
            'artisan_profile_id' => 1,
            'url' => fake()->randomElement(self::IMAGES),
            'caption' => fake()->randomElement(self::CAPTIONS),
        ];
    }
}
