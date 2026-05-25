<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    // Prénoms marocains
    private const PRENOMS = [
        'Youssef', 'Rachid', 'Fatima', 'Tarik', 'Hamza', 'Mourad',
        'Karima', 'Brahim', 'Nassima', 'Omar', 'Amina', 'Mehdi',
        'Nadia', 'Hassan', 'Laila', 'Khalid', 'Salma', 'Amine',
        'Zineb', 'Reda', 'Houda', 'Samir', 'Meryem', 'Adil',
    ];

    // Noms de famille marocains
    private const NOMS = [
        'El Fassi', 'Bennani', 'Mansouri', 'Amrani', 'El Idrissi',
        'Cherkaoui', 'El Gharbaoui', 'El Amrani', 'El Oujdi', 'Benjelloun',
        'Tazi', 'Chraibi', 'Alaoui', 'Berrada', 'Belhaj', 'Filali',
        'Benkirane', 'Kettani', 'Sqalli', 'Lahlou',
    ];

    private const VILLES = [
        'Casablanca', 'Marrakech', 'Fès', 'Rabat', 'Tanger',
        'Agadir', 'Meknès', 'Oujda', 'Tétouan', 'Kénitra',
    ];

    public function definition(): array
    {
        $prenom = fake()->randomElement(self::PRENOMS);
        $nom = fake()->randomElement(self::NOMS);

        return [
            'name' => "$prenom $nom",
            'email' => Str::slug("$prenom $nom") . '-' . fake()->unique()->numberBetween(1, 9999) . '@handpro.ma',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'client',
            'phone' => '+212 6 ' . fake()->numerify('## ## ## ##'),
            'city' => fake()->randomElement(self::VILLES),
            'remember_token' => Str::random(10),
        ];
    }

    public function artisan(): static
    {
        return $this->state(fn () => ['role' => 'artisan']);
    }

    public function admin(): static
    {
        return $this->state(fn () => ['role' => 'admin']);
    }

    public function unverified(): static
    {
        return $this->state(fn () => ['email_verified_at' => null]);
    }
}
