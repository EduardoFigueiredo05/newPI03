<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PackageSeeder extends Seeder
{
    public function run()
    {
        // 1. Criar Usuário Admin
        User::create([
            'name' => 'Admin Master',
            'email' => 'admin@worldtour.com',
            'password' => Hash::make('senha123'), // Senha para logar depois
            'role' => 'admin', // Se você adicionou essa coluna, senão remova
        ]);

        // 2. Pegar países para vincular os pacotes
        $espanha = Country::where('slug', 'espanha')->first();
        $japao = Country::where('slug', 'japao')->first();

        // 3. Criar Pacote: Trip Europa
        if($espanha) {
            Package::create([
                'country_id' => $espanha->id,
                'title' => 'Trip Europa – Madri e Barcelona',
                'subtitle' => '10 dias de cultura e arte',
                'slug' => 'trip-europa-madri',
                'price' => 5890.00,
                'days' => 10,
                'nights' => 9,
                'details_itinerary' => 'Dia 1: Chegada em Madri...',
                'details_included' => 'Aéreo, Hotel 4 estrelas, Café da manhã',
                'details_conditions' => 'Cancelamento grátis até 7 dias antes',
                'image_main' => 'img/madrid-3952068_640.jpg',
                'is_active' => true
            ]);
        }

        // 4. Criar Pacote: Japão
        if($japao) {
            Package::create([
                'country_id' => $japao->id,
                'title' => 'Japão Tradicional',
                'subtitle' => 'Tóquio, Quioto e Osaka',
                'slug' => 'japao-tradicional',
                'price' => 12500.00,
                'days' => 15,
                'nights' => 14,
                'details_itinerary' => 'Dia 1: Chegada em Tóquio...',
                'details_included' => 'Aéreo, Trem Bala, Guia em Português',
                'details_conditions' => 'Visto necessário',
                'image_main' => 'https://images.unsplash.com/photo-1528164344705-47542687000d?q=80&w=800&auto=format&fit=crop',
                'is_active' => true
            ]);
        }
    }
}