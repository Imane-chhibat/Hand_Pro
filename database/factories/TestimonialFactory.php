<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    private const QUOTES = [
        "Grâce à HandPro, j'ai trouvé un électricien diplômé de l'OFPPT en 10 minutes. Une vraie révolution !",
        "La rénovation de notre maison d'hôtes était un défi. HandPro nous a permis de comparer les portfolios certifiés.",
        "La fonction GPS est formidable. J'ai pu repérer l'artisan le plus proche. Transparence totale.",
        "Service exceptionnel ! L'artisan est arrivé à l'heure et le travail était impeccable.",
        "Je recommande HandPro à tous. Trouver un artisan qualifié n'a jamais été aussi simple.",
        "Plateforme sérieuse avec des artisans vérifiés. Mon plombier était top !",
    ];

    private const NOMS = [
        'Dr. Amina Tazi', 'Laurent & Myriam', 'Omar Chraibi',
        'Samira El Alaoui', 'Jean-Pierre Moreau', 'Khalid Benhima',
        'Fatima Zahra Benkaddour', 'Marc Dupont', 'Houda Filali',
    ];

    private const CITIES = ['Casablanca', 'Marrakech', 'Rabat', 'Fès', 'Tanger', 'Agadir'];

    private const AVATARS = [
        'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=150&q=80',
        'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80',
        'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80',
        'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80',
    ];

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(self::NOMS),
            'city' => fake()->randomElement(self::CITIES),
            'quote' => fake()->randomElement(self::QUOTES),
            'rating' => fake()->numberBetween(4, 5),
            'avatar' => fake()->randomElement(self::AVATARS),
        ];
    }
}
