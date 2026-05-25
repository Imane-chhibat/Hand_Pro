<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    protected $model = Announcement::class;

    private const TITLES = [
        'Recherche Chef Électricien Bâtiment Qualifié',
        'Menuisier Ébéniste Expérimenté (H/F)',
        'Technicien Supérieur en Climatisation & Froid',
        'Maître Zelligeur pour grand chantier de restauration',
        'Plombier Sanitaire pour projet résidentiel',
        'Peintre Décorateur pour hôtel 5 étoiles',
        'Ferronnier d\'Art pour villa de luxe',
        'Électricien Domotique certifié KNX',
    ];

    private const COMPANIES = [
        'Atlas Construction Luxe', 'Riad Design Fès', 'Marrakech Climat Pro',
        'Patrimoine & Mosaïque SARL', 'Royal Mansour Marrakech', 'Addoha Group',
        'Alliances Développement', 'Tanger Med Engineering',
    ];

    private const CITIES = ['Casablanca', 'Marrakech', 'Fès', 'Rabat', 'Tanger', 'Agadir'];

    private const CATEGORIES = ['Électricité', 'Menuiserie', 'Climatisation', 'Maçonnerie', 'Plomberie', 'Peinture'];

    private const DATES = ["Aujourd'hui", 'Hier', 'Il y a 3 jours', 'Il y a 5 jours', 'Il y a 1 semaine'];

    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(self::TITLES),
            'company' => fake()->randomElement(self::COMPANIES),
            'category' => fake()->randomElement(self::CATEGORIES),
            'city' => fake()->randomElement(self::CITIES),
            'date' => fake()->randomElement(self::DATES),
            'description' => fake()->paragraph(2),
        ];
    }
}
