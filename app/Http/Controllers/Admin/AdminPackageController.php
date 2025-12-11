<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPackageController extends Controller
{
    // 1. Mostrar o Formulário de Criação
    public function create()
    {
        // Buscamos os países para preencher o <select>
        $countries = Country::orderBy('name')->get();
        return view('admin.packages.create', compact('countries'));
    }

    // 2. Salvar o Pacote no Banco
    public function store(Request $request)
    {
        // Validação básica
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'price' => 'required|numeric',
            'days' => 'required|integer',
            'nights' => 'required|integer',
            'image_main' => 'required|url', // Valida se é um Link
            // Campos opcionais
            'subtitle' => 'nullable|string',
            'details_itinerary' => 'nullable|string',
            'details_included' => 'nullable|string',
            'details_conditions' => 'nullable|string',
            'info_general' => 'nullable|string',
            'info_gastronomy' => 'nullable|string',
            'info_nightlife' => 'nullable|string',
        ]);

        // Gera o Slug (URL amigável) automaticamente
        // Ex: "Trip Japão" vira "trip-japao"
        $data['slug'] = Str::slug($request->title) . '-' . time();
        $data['is_active'] = true;

        // Cria o pacote
        Package::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Pacote criado com sucesso!');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $countries = Country::orderBy('name')->get();
        
        return view('admin.packages.edit', compact('package', 'countries'));
    }

    // 4. ATUALIZAR (Salva as mudanças)
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'price' => 'required|numeric',
            'days' => 'required|integer',
            'nights' => 'required|integer',
            'image_main' => 'required|url', // Agora aceita links longos (text no banco)
            'subtitle' => 'nullable|string',
            'details_itinerary' => 'nullable|string',
            'details_included' => 'nullable|string',
            'details_conditions' => 'nullable|string',
            // is_active é tratado separadamente abaixo
        ]);

      
        if ($package->title !== $request->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        $package->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Pacote atualizado com sucesso!');
    }

    // 5. EXCLUIR (Deleta do banco)
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Pacote excluído.');
    }
}