<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    private const COMMENTS = [
        'Un vrai Maâlem ! Travail exceptionnel. Délais respectés et finition irréprochable.',
        'Intervention très professionnelle. Travail propre et tarification transparente.',
        'Une véritable artiste. Ses conseils ont transformé notre maison.',
        'Ponctuel, poli et d\'une compétence rare. Je recommande vivement.',
        'Le résultat dépasse mes attentes ! Merci pour ce travail d\'exception.',
        'Économies réelles dès le premier mois. Très professionnel.',
        'Finitions absolument parfaites. Il a laissé la maison impeccable.',
        'Travail soigné et rapide. Je ferai appel à lui de nouveau.',
    ];

    private const NOMS_CLIENTS = [
        'Karim B.', 'Sophie M.', 'Hassan E.', 'Valérie D.', 'Mehdi S.',
        'Nadia L.', 'Abdelkader T.', 'Nezha G.', 'Mohammed K.', 'Yasmine B.',
        'Omar F.', 'Laila R.', 'Ahmed Z.', 'Fatima H.', 'Samir J.',
    ];

    public function definition(): array
    {
        return [
            'artisan_profile_id' => 1,
            'client_name' => fake()->randomElement(self::NOMS_CLIENTS),
            'client_avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80',
            'comment' => fake()->randomElement(self::COMMENTS),
            'rating' => fake()->numberBetween(4, 5),
        ];
    }
}
