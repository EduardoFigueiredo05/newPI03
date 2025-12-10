<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Busca os 3 últimos pacotes ativos para mostrar na Home
        $featuredPackages = Package::where('is_active', true)
        ->latest()
        ->take(3)
        ->get();

        // Retorna a view 'site.home' enviando os pacotes
        return view('site.home', compact('featuredPackages'));
    }
}