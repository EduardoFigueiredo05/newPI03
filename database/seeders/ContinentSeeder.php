<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Continent;
use App\Models\Country;

class ContinentSeeder extends Seeder
{
    public function run()
    {
        // 1. América do Sul
        $sul = Continent::create([
            'name' => 'América do Sul',
            'slug' => 'america-sul',
            'image_cover' => 'img/america-sul.jpg', // Certifique-se de ter essa img
            'description' => 'Aventura, paisagens naturais, história.'
        ]);
        
        // Países da América do Sul
        Country::create([
            'continent_id' => $sul->id,
            'name' => 'Brasil',
            'slug' => 'brasil',
            'image_cover' => 'img/brasil.jpg',
            'short_description' => 'Praias, paisagens naturais, gastronomia.'
        ]);
        
        // 2. Europa
        $europa = Continent::create([
            'name' => 'Europa',
            'slug' => 'europa',
            'image_cover' => 'img/europa.jpg',
            'description' => 'Cidades históricas, museus, gastronomia.'
        ]);

        Country::create([
            'continent_id' => $europa->id,
            'name' => 'Espanha',
            'slug' => 'espanha',
            'image_cover' => 'img/madrid-3952068_640.jpg',
            'short_description' => 'Aventura, paisagens naturais, história.'
        ]);

        // 3. Ásia
        $asia = Continent::create([
            'name' => 'Ásia',
            'slug' => 'asia',
            'image_cover' => 'img/asia.jpg',
            'description' => 'Templos, cultura, culinária.'
        ]);

        Country::create([
            'continent_id' => $asia->id,
            'name' => 'Japão',
            'slug' => 'japao',
            'image_cover' => 'img/japao.jpg',
            'short_description' => 'Gastronomia, tecnologia, templos antigos.'
        ]);

        
    }
}