<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Continent; // Importante!
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // 1. Página Principal (Lista os Continentes)
    public function index()
    {
        // Busca todos os continentes para gerar os cards
        $continents = Continent::all();
        
        return view('site.packages.index', compact('continents'));
    }

    // 2. Detalhes do Pacote (Já estava pronto)
    public function show($slug)
    {
        $package = Package::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('site.packages.show', compact('package'));
    }

    // 3. NOVO: Página do Continente (Lista os pacotes daquele continente)
    public function continent($slug)
    {
        // Busca o continente pelo slug (ex: 'europa')
        $continent = Continent::where('slug', $slug)->firstOrFail();

        // Busca os pacotes que pertencem aos países desse continente
        // Usamos o 'whereHas' para filtrar pacotes pelo relacionamento 'country' -> 'continent'
        $packages = Package::whereHas('country', function($query) use ($continent) {
            $query->where('continent_id', $continent->id);
        })->where('is_active', true)->get();

        return view('site.continents.show', compact('continent', 'packages'));
    }
}