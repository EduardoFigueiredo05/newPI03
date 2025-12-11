@extends('layouts.admin')

@section('content')

    <div class="page-header-container">
        <a href="{{ route('admin.dashboard') }}" class="admin-back-button" title="Voltar">
            <span class="material-icons">arrow_back</span>
        </a> 
        <h2 class="page-header-title">Editar: {{ $continent->name }}</h2>
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

        <form action="{{ route('admin.continents.update', $continent->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nome do Continente</label>
                <input class="form-input" type="text" name="name" value="{{ old('name', $continent->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Imagem de Capa (URL)</label>
                <input class="form-input" type="url" name="image_cover" value="{{ old('image_cover', $continent->image_cover) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Descrição Curta</label>
                <textarea class="form-textarea" name="description" required>{{ old('description', $continent->description) }}</textarea>
            </div>
            
            <div class="admin-form-submit">
                <button type="submit" class="btn--success">Atualizar Continente</button>
            </div>
        </form>
    </main>

@endsection