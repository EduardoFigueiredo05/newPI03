<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminContinentController extends Controller
{
    // 1. CRIAR (Formulário)
    public function create()
    {
        return view('admin.continents.create');
    }

    // 2. SALVAR (Banco)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:continents,name',
            'image_cover' => 'required|url', // Aceita link
            'description' => 'required|string|max:500', // Descrição curta
        ]);

        $data['slug'] = Str::slug($request->name);

        Continent::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Continente adicionado com sucesso!');
    }

    // 3. EDITAR (Formulário)
    public function edit($id)
    {
        $continent = Continent::findOrFail($id);
        return view('admin.continents.edit', compact('continent'));
    }

    // 4. ATUALIZAR (Banco)
    public function update(Request $request, $id)
    {
        $continent = Continent::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255|unique:continents,name,' . $id,
            'image_cover' => 'required|url',
            'description' => 'required|string|max:500',
        ]);

        if ($continent->name !== $request->name) {
            $data['slug'] = Str::slug($request->name);
        }

        $continent->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Continente atualizado!');
    }

    // 5. EXCLUIR
    public function destroy($id)
    {
        $continent = Continent::findOrFail($id);
        
        // Verifica se tem países/pacotes vinculados para evitar erros
        if ($continent->countries()->count() > 0) {
            return back()->with('error', 'Não é possível excluir este continente pois ele possui países vinculados.');
        }

        $continent->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Continente excluído.');
    }
}