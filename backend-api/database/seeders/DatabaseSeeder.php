<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\ArtisanProfile;
use App\Models\Service;
use App\Models\Skill;
use App\Models\PortfolioItem;
use App\Models\Review;
use App\Models\Announcement;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin ──
        User::create([
            'name' => 'Admin HandPro',
            'email' => 'admin@handpro.ma',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'city' => 'Casablanca',
        ]);

        // ── Client ──
        User::create([
            'name' => 'Karim Benjelloun',
            'email' => 'client@handpro.ma',
            'password' => Hash::make('password'),
            'role' => 'client',
            'city' => 'Rabat',
            'phone' => '+212 6 70 00 00 01',
        ]);

        // ── Catégories ──
        $cats = [
            ['slug' => 'menuiserie',    'name' => 'Menuiserie',           'icon_name' => 'Hammer'],
            ['slug' => 'electricite',   'name' => 'Électricité',          'icon_name' => 'Zap'],
            ['slug' => 'plomberie',     'name' => 'Plomberie',            'icon_name' => 'Droplet'],
            ['slug' => 'aluminium',     'name' => 'Aluminium & Verre',    'icon_name' => 'Layers'],
            ['slug' => 'mecanique',     'name' => 'Mécanique',            'icon_name' => 'Wrench'],
            ['slug' => 'peinture',      'name' => 'Peinture & Déco',      'icon_name' => 'Brush'],
            ['slug' => 'maconnerie',    'name' => 'Maçonnerie & Zellige', 'icon_name' => 'Compass'],
            ['slug' => 'climatisation', 'name' => 'Climatisation',        'icon_name' => 'Wind'],
        ];
        foreach ($cats as $c) { Category::create($c); }

        // ── Artisans (10) ──
        $artisans = [
            [
                'name' => 'Maâlem Youssef El Fassi', 'email' => 'youssef@handpro.ma',
                'city' => 'Fès', 'phone' => '+212 6 61 23 45 67', 'cat' => 'menuiserie',
                'specialty' => 'Menuiserie & Ébénisterie', 'rating' => 4.9, 'reviews' => 142,
                'certified' => true, 'exp' => 18, 'avail' => 'available',
                'desc' => "Diplômé de l'Institut Spécialisé des Arts Traditionnels et de l'OFPPT.",
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80',
                'cover' => 'https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?auto=format&fit=crop&w=1200&q=80',
                'lat' => 34.0333, 'lng' => -5.0000,
                'services' => [
                    ['name' => 'Portes traditionnelles sculptées', 'price_range' => '3500 - 8000 MAD', 'description' => 'Fabrication artisanale en bois de cèdre.'],
                    ['name' => 'Agencement sur-mesure de salons', 'price_range' => 'Sur devis', 'description' => 'Banquettes marocaines, tables basses.'],
                ],
                'skills' => [['name'=>'Sculpture sur bois','percentage'=>98],['name'=>'Vernis au tampon','percentage'=>95]],
                'portfolio' => [
                    ['url'=>'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80','caption'=>'Porte sculptée'],
                ],
                'review_data' => [
                    ['client_name'=>'Karim B.','comment'=>'Un vrai Maâlem ! Travail exceptionnel.','rating'=>5],
                ],
            ],
            [
                'name' => 'Rachid Bennani', 'email' => 'rachid@handpro.ma',
                'city' => 'Casablanca', 'phone' => '+212 6 62 88 11 00', 'cat' => 'electricite',
                'specialty' => 'Électricité & Domotique', 'rating' => 4.8, 'reviews' => 98,
                'certified' => true, 'exp' => 12, 'avail' => 'available',
                'desc' => "Lauréat de l'OFPPT en Électricité de Maintenance Industrielle.",
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80',
                'cover' => 'https://images.unsplash.com/photo-1555680202-c86f0e12f086?auto=format&fit=crop&w=1200&q=80',
                'lat' => 33.5731, 'lng' => -7.5898,
                'services' => [
                    ['name' => 'Installation électrique complète', 'price_range' => '4000 - 15000 MAD', 'description' => 'Câblage et mise à la terre.'],
                ],
                'skills' => [['name'=>'Normes NF/NM','percentage'=>100],['name'=>'Domotique','percentage'=>92]],
                'portfolio' => [], 'review_data' => [],
            ],
            [
                'name' => 'Fatima Zohra Mansouri', 'email' => 'fatima@handpro.ma',
                'city' => 'Marrakech', 'phone' => '+212 6 63 44 55 66', 'cat' => 'maconnerie',
                'specialty' => 'Maçonnerie & Zellige Traditionnel', 'rating' => 4.95, 'reviews' => 210,
                'certified' => true, 'exp' => 22, 'avail' => 'busy', 'busy_until' => '12 Juin',
                'desc' => 'Maître Zelligeuse diplômée et formatrice associée.',
                'avatar' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80',
                'cover' => 'https://images.unsplash.com/photo-1541971875076-8f970d573be6?auto=format&fit=crop&w=1200&q=80',
                'lat' => 31.6295, 'lng' => -7.9811,
                'services' => [
                    ['name' => 'Pose de zellige Beldi', 'price_range' => '800 - 2500 MAD / m²', 'description' => 'Mosaïques géométriques traditionnelles.'],
                ],
                'skills' => [['name'=>'Taille au marteau','percentage'=>99],['name'=>'Composition géométrique','percentage'=>98]],
                'portfolio' => [], 'review_data' => [],
            ],
            [
                'name' => 'Tarik Amrani', 'email' => 'tarik@handpro.ma',
                'city' => 'Rabat', 'phone' => '+212 6 60 99 88 77', 'cat' => 'plomberie',
                'specialty' => 'Plomberie & Sanitaire', 'rating' => 4.7, 'reviews' => 84,
                'certified' => true, 'exp' => 9, 'avail' => 'available',
                'desc' => 'Expert plomberie certifié OFPPT.',
                'avatar' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&q=80',
                'cover' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?auto=format&fit=crop&w=1200&q=80',
                'lat' => 34.0209, 'lng' => -6.8416,
                'services' => [], 'skills' => [], 'portfolio' => [], 'review_data' => [],
            ],
            [
                'name' => 'Hamza El Idrissi', 'email' => 'hamza@handpro.ma',
                'city' => 'Tanger', 'phone' => '+212 6 64 11 22 33', 'cat' => 'aluminium',
                'specialty' => 'Aluminium & Verre', 'rating' => 4.6, 'reviews' => 61,
                'certified' => false, 'exp' => 14, 'avail' => 'available',
                'desc' => 'Spécialiste menuiserie aluminium haut de gamme.',
                'avatar' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=300&q=80',
                'cover' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                'lat' => 35.7595, 'lng' => -5.8340,
                'services' => [], 'skills' => [], 'portfolio' => [], 'review_data' => [],
            ],
            [
                'name' => 'Mourad Cherkaoui', 'email' => 'mourad@handpro.ma',
                'city' => 'Casablanca', 'phone' => '+212 6 65 90 12 34', 'cat' => 'peinture',
                'specialty' => 'Peinture & Déco', 'rating' => 4.85, 'reviews' => 112,
                'certified' => true, 'exp' => 16, 'avail' => 'available',
                'desc' => 'Expert en revêtements décoratifs traditionnels et modernes.',
                'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80',
                'cover' => 'https://images.unsplash.com/photo-1562259949-e8e7689d7828?auto=format&fit=crop&w=1200&q=80',
                'lat' => 33.5850, 'lng' => -7.6100,
                'services' => [], 'skills' => [], 'portfolio' => [], 'review_data' => [],
            ],
        ];

        foreach ($artisans as $a) {
            $cat = Category::where('slug', $a['cat'])->first();

            $user = User::create([
                'name' => $a['name'], 'email' => $a['email'],
                'password' => Hash::make('password'), 'role' => 'artisan',
                'city' => $a['city'], 'phone' => $a['phone'],
            ]);

            $profile = ArtisanProfile::create([
                'user_id' => $user->id, 'category_id' => $cat?->id,
                'specialty' => $a['specialty'], 'description' => $a['desc'],
                'avatar' => $a['avatar'], 'cover_photo' => $a['cover'],
                'rating' => $a['rating'], 'review_count' => $a['reviews'],
                'is_certified' => $a['certified'], 'experience_years' => $a['exp'],
                'availability' => $a['avail'], 'busy_until' => $a['busy_until'] ?? null,
                'lat' => $a['lat'], 'lng' => $a['lng'], 'distance_km' => rand(1, 15),
            ]);

            foreach ($a['services'] as $s) { Service::create(array_merge($s, ['artisan_profile_id' => $profile->id])); }
            foreach ($a['skills'] as $s)   { Skill::create(array_merge($s, ['artisan_profile_id' => $profile->id])); }
            foreach ($a['portfolio'] as $p){ PortfolioItem::create(array_merge($p, ['artisan_profile_id' => $profile->id])); }
            foreach ($a['review_data'] as $r){ Review::create(array_merge($r, ['artisan_profile_id' => $profile->id])); }
        }

        // ── Announcements ──
        Announcement::create(['title'=>'Recherche Chef Électricien Qualifié','company'=>'Atlas Construction Luxe','category'=>'Électricité','city'=>'Casablanca','date'=>"Aujourd'hui",'description'=>'Nous recrutons un chef qualifié pour superviser le câblage de 12 villas.']);
        Announcement::create(['title'=>'Menuisier Ébéniste Expérimenté','company'=>'Riad Design Fès','category'=>'Menuiserie','city'=>'Fès','date'=>'Hier','description'=>'Atelier de création de mobilier haut de gamme.']);
        Announcement::create(['title'=>'Technicien Climatisation & Froid','company'=>'Marrakech Climat Pro','category'=>'Climatisation','city'=>'Marrakech','date'=>'Il y a 3 jours','description'=>'Entretien des groupes frigorifiques de grands hôtels.']);
        Announcement::create(['title'=>'Maître Zelligeur pour restauration','company'=>'Patrimoine & Mosaïque SARL','category'=>'Maçonnerie','city'=>'Rabat','date'=>'Il y a 5 jours','description'=>'Recherche 3 artisans zelligeurs confirmés.']);

        // ── Testimonials ──
        Testimonial::create(['name'=>'Dr. Amina Tazi','city'=>'Casablanca','quote'=>"Grâce à HandPro, j'ai trouvé un électricien diplômé en 10 minutes.",'rating'=>5,'avatar'=>'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=150&q=80']);
        Testimonial::create(['name'=>'Laurent & Myriam','city'=>'Marrakech','quote'=>"La rénovation de notre maison d'hôtes était un défi. HandPro nous a aidés.",'rating'=>5,'avatar'=>'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80']);
        Testimonial::create(['name'=>'Omar Chraibi','city'=>'Rabat','quote'=>"La fonction GPS est formidable. Transparence totale.",'rating'=>5,'avatar'=>'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80']);
    }
}
