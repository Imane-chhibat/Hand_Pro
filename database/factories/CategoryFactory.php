<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    private const CATEGORIES = [
        ['slug' => 'menuiserie',    'name' => 'Menuiserie',           'icon_name' => 'Hammer'],
        ['slug' => 'electricite',   'name' => 'Électricité',          'icon_name' => 'Zap'],
        ['slug' => 'plomberie',     'name' => 'Plomberie',            'icon_name' => 'Droplet'],
        ['slug' => 'aluminium',     'name' => 'Aluminium & Verre',    'icon_name' => 'Layers'],
        ['slug' => 'mecanique',     'name' => 'Mécanique',            'icon_name' => 'Wrench'],
        ['slug' => 'peinture',      'name' => 'Peinture & Déco',      'icon_name' => 'Brush'],
        ['slug' => 'maconnerie',    'name' => 'Maçonnerie & Zellige', 'icon_name' => 'Compass'],
        ['slug' => 'climatisation', 'name' => 'Climatisation',        'icon_name' => 'Wind'],
    ];

    public function definition(): array
    {
        $cat = fake()->randomElement(self::CATEGORIES);
        return $cat;
    }
}
