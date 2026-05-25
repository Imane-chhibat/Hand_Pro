<?php

namespace Database\Factories;

use App\Models\ArtisanProfile;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtisanProfileFactory extends Factory
{
    protected $model = ArtisanProfile::class;

    private const SPECIALTIES = [
        'menuiserie'    => ['Menuiserie & Ébénisterie', 'Menuiserie Aluminium', 'Charpente traditionnelle'],
        'electricite'   => ['Électricité & Domotique', 'Électricité Bâtiment', 'Câblage Industriel'],
        'plomberie'     => ['Plomberie & Sanitaire', 'Plomberie & Chauffage Solaire', 'Installation Thermique'],
        'aluminium'     => ['Aluminium & Verre', 'Façades Vitrées', 'Menuiserie PVC'],
        'mecanique'     => ['Mécanique Auto', 'Mécanique Industrielle', 'Soudure & Ferronnerie'],
        'peinture'      => ['Peinture & Déco', 'Tadelakt & Enduits', 'Stuc Vénitien'],
        'maconnerie'    => ['Maçonnerie & Zellige', 'Gros Œuvre', 'Carrelage de Luxe'],
        'climatisation' => ['Climatisation & Froid', 'Ventilation Industrielle', 'Pompe à Chaleur'],
    ];

    private const DESCRIPTIONS = [
        "Diplômé de l'OFPPT avec plus de 10 ans d'expérience. Travail soigné et professionnel garanti.",
        "Maître artisan certifié, spécialiste reconnu dans tout le Maroc. Précision et passion.",
        "Expert passionné alliant savoir-faire ancestral et techniques modernes.",
        "Professionnel certifié avec une réputation solide. Satisfaction client garantie.",
        "Lauréat de l'Institut Spécialisé des Arts Traditionnels. Travail d'exception.",
    ];

    private const AVATARS = [
        'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=300&q=80',
    ];

    private const COORDS = [
        'Casablanca' => ['lat' => 33.5731, 'lng' => -7.5898],
        'Marrakech'  => ['lat' => 31.6295, 'lng' => -7.9811],
        'Fès'        => ['lat' => 34.0333, 'lng' => -5.0000],
        'Rabat'      => ['lat' => 34.0209, 'lng' => -6.8416],
        'Tanger'     => ['lat' => 35.7595, 'lng' => -5.8340],
        'Agadir'     => ['lat' => 30.4278, 'lng' => -9.5981],
        'Meknès'     => ['lat' => 33.8935, 'lng' => -5.5547],
        'Oujda'      => ['lat' => 34.6805, 'lng' => -1.9076],
    ];

    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        $slug = $category?->slug ?? 'menuiserie';
        $specs = self::SPECIALTIES[$slug] ?? self::SPECIALTIES['menuiserie'];
        $user = User::factory()->artisan()->create();
        $city = $user->city ?? 'Casablanca';
        $coords = self::COORDS[$city] ?? ['lat' => 33.57, 'lng' => -7.59];

        return [
            'user_id' => $user->id,
            'category_id' => $category?->id,
            'specialty' => fake()->randomElement($specs),
            'description' => fake()->randomElement(self::DESCRIPTIONS),
            'avatar' => fake()->randomElement(self::AVATARS),
            'cover_photo' => 'https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?auto=format&fit=crop&w=1200&q=80',
            'rating' => fake()->randomFloat(2, 4.0, 5.0),
            'review_count' => fake()->numberBetween(10, 250),
            'is_certified' => fake()->boolean(70),
            'experience_years' => fake()->numberBetween(3, 25),
            'availability' => fake()->randomElement(['available', 'available', 'available', 'busy']),
            'busy_until' => null,
            'lat' => $coords['lat'] + fake()->randomFloat(4, -0.05, 0.05),
            'lng' => $coords['lng'] + fake()->randomFloat(4, -0.05, 0.05),
            'distance_km' => fake()->randomFloat(1, 0.5, 20),
        ];
    }
}
