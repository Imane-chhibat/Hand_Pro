<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    private const SERVICES = [
        ['name' => 'Portes traditionnelles sculptées',     'price_range' => '3500 - 8000 MAD'],
        ['name' => 'Installation électrique complète',     'price_range' => '4000 - 15000 MAD'],
        ['name' => 'Rénovation de salle de bain',          'price_range' => '5000 - 20000 MAD'],
        ['name' => 'Pose de zellige Beldi',                'price_range' => '800 - 2500 MAD / m²'],
        ['name' => 'Fenêtres et baies coulissantes',       'price_range' => '1200 - 3500 MAD / m²'],
        ['name' => 'Peinture décorative marocaine',        'price_range' => '80 - 250 MAD / m²'],
        ['name' => 'Dépannage d\'urgence 24/7',            'price_range' => '300 - 800 MAD'],
        ['name' => 'Faux plafond suspendu en plâtre',      'price_range' => '150 - 450 MAD / m²'],
        ['name' => 'Garde-corps en fer forgé',             'price_range' => '1200 - 3000 MAD / m'],
        ['name' => 'Installation chauffe-eau solaire',     'price_range' => '4500 - 9000 MAD'],
        ['name' => 'Intégration domotique & Smart Home',   'price_range' => 'Sur devis'],
        ['name' => 'Agencement sur-mesure de salons',      'price_range' => 'Sur devis'],
    ];

    public function definition(): array
    {
        $service = fake()->randomElement(self::SERVICES);

        return [
            'artisan_profile_id' => 1,
            'name' => $service['name'],
            'price_range' => $service['price_range'],
            'description' => fake()->sentence(10),
        ];
    }
}
