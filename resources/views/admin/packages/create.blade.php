@extends('layouts.admin')

@section('content')

    <div class="page-header-container">
        <a href="{{ route('admin.dashboard') }}" class="admin-back-button" title="Voltar" style="position: relative; margin-right: 16px;">
            <span class="material-icons">arrow_back</span>
        </a> 
        <h2 class="page-header-title">Adicionar Pacote</h2>
    </div>

    <main class="admin-form-container">
        
        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="admin-form" action="{{ route('admin.packages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="title">Nome do Pacote</label>
                <input class="form-input" type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Ex: Trip Japão">
            </div>

            <div class="form-group">
                <label class="form-label" for="subtitle">Subtítulo</label>
                <input class="form-input" type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" placeholder="Ex: Tóquio, Quioto e Osaka">
            </div>

            <div class="form-group">
                <label class="form-label" for="price">Preço (R$)</label>
                <input class="form-input" type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" required placeholder="Ex: 5000.00">
            </div>

            <div class="form-group">
                <label class="form-label" for="days">Dias</label>
                <input class="form-input" type="number" id="days" name="days" value="{{ old('days') }}" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="nights">Noites</label>
                <input class="form-input" type="number" id="nights" name="nights" value="{{ old('nights') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="country_id">País de Destino</label>
                <select class="form-select" id="country_id" name="country_id" required>
                    <option value="">Selecione um país...</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group form-group--full-width">
                <label class="form-label" for="image_main">Link da Imagem Principal</label>
                <input class="form-input" type="url" id="image_main" name="image_main" value="{{ old('image_main') }}" placeholder="https://..." required>
            </div>

            <div class="form-group form-group--full-width">
                <label class="form-label" for="details_itinerary">Itinerário (Detalhes)</label>
                <textarea class="form-textarea" id="details_itinerary" name="details_itinerary">{{ old('details_itinerary') }}</textarea>
            </div>

            <div class="form-group form-group--full-width">
                <label class="form-label" for="details_included">O que inclui</label>
                <textarea class="form-textarea" id="details_included" name="details_included">{{ old('details_included') }}</textarea>
            </div>

            <div class="form-group form-group--full-width">
                <label class="form-label" for="details_conditions">Condições Gerais</label>
                <textarea class="form-textarea" id="details_conditions" name="details_conditions">{{ old('details_conditions') }}</textarea>
            </div>
            
            <div class="admin-form-submit">
                <button type="submit" class="btn--success">Salvar Pacote</button>
            </div>

        </form>
    </main>

@endsection