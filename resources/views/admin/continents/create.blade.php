@extends('layouts.admin')

@section('content')

    <div class="page-header-container">
        <a href="{{ route('admin.dashboard') }}" class="admin-back-button" title="Voltar">
            <span class="material-icons">arrow_back</span>
        </a> 
        <h2 class="page-header-title">Adicionar Continente</h2>
    </div>

    <main class="admin-form-container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: inside;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.continents.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Nome do Continente</label>
                <input class="form-input" type="text" name="name" value="{{ old('name') }}" required placeholder="Ex: Antártida">
            </div>

            <div class="form-group">
                <label class="form-label">Imagem de Capa (URL)</label>
                <input class="form-input" type="url" name="image_cover" value="{{ old('image_cover') }}" required placeholder="https://...">
            </div>

            <div class="form-group">
                <label class="form-label">Descrição Curta</label>
                <textarea class="form-textarea" name="description" required placeholder="Uma frase impactante sobre o destino...">{{ old('description') }}</textarea>
            </div>
            
            <div class="admin-form-submit">
                <button type="submit" class="btn--success">Salvar Continente</button>
            </div>
        </form>
    </main>

@endsection