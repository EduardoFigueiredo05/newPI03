<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Continent;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Busca os dados para as 3 tabelas do seu HTML
        $packages = Package::with('country')->latest()->take(5)->get(); // Últimos 5
        $continents = Continent::withCount('countries')->get(); // Continentes + contagem
        $users = User::latest()->take(5)->get(); // Últimos 5 usuários

        return view('admin.dashboard', compact('packages', 'continents', 'users'));
    }
}