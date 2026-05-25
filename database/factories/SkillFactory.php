<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    protected $model = Skill::class;

    private const SKILLS = [
        'Sculpture sur bois', 'Vernis au tampon', 'Normes de sécurité NF/NM',
        'Domotique (KNX, ZigBee)', 'Soudure cuivre & multicouche', 'Taille au marteau',
        'Composition géométrique', 'Tadelakt traditionnel', 'Découpe CNC',
        'Étanchéité structurelle', 'Maîtrise des enduits', 'Colorimétrie',
        'Soudure à l\'arc & TIG', 'Ciselage de plâtre', 'Modélisation 3D',
        'Câblage structuré', 'Éclairage architectural', 'Plomberie haute pression',
    ];

    public function definition(): array
    {
        return [
            'artisan_profile_id' => 1,
            'name' => fake()->randomElement(self::SKILLS),
            'percentage' => fake()->numberBetween(75, 100),
        ];
    }
}
