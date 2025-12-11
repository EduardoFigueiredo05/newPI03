@extends('layouts.admin')

@section('content')

    <div class="page-header-container">
        <a href="{{ route('admin.dashboard') }}" class="admin-back-button" title="Voltar" style="margin-right: 16px;">
            <span class="material-icons">arrow_back</span>
        </a> 
        <h2 class="page-header-title">Editar Pacote: {{ $package->title }}</h2>
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

        <form class="admin-form" action="{{ route('admin.packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="form-group">
                <label class="form-label" for="title">Nome do Pacote</label>
                <input class="form-input" type="text" id="title" name="title" value="{{ old('title', $package->title) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="subtitle">Subtítulo</label>
                <input class="form-input" type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $package->subtitle) }}">
            </div>

            <div class="form-group">
                <label class="form-label" for="price">Preço (R$)</label>
                <input class="form-input" type="number" step="0.01" id="price" name="price" value="{{ old('price', $package->price) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="days">Dias</label>
                <input class="form-input" type="number" id="days" name="days" value="{{ old('days', $package->days) }}" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="nights">Noites</label>
                <input class="form-input" type="number" id="nights" name="nights" value="{{ old('nights', $package->nights) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="country_id">País de Destino</label>
                <select class="form-select" id="country_id" name="country_id" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $package->country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group form-group--full-width">
                <label class="form-label" for="image_main">Link da Imagem Principal</label>
                <input class="form-input" type="url" id="image_main" name="image_main" value="{{ old('image_main', $package->image_main) }}" required>
            </div>

            <div class="form-group form-group--full-width">
                <label class="form-label" for="details_itinerary">Itinerário</label>
                <textarea class="form-textarea" id="details_itinerary" name="details_itinerary">{{ old('details_itinerary', $package->details_itinerary) }}</textarea>
            </div>

            <div class="form-group form-group--full-width">
                <label class="form-label" for="details_included">O que inclui</label>
                <textarea class="form-textarea" id="details_included" name="details_included">{{ old('details_included', $package->details_included) }}</textarea>
            </div>

            <div class="form-group form-group--full-width">
                <label class="form-label" for="details_conditions">Condições Gerais</label>
                <textarea class="form-textarea" id="details_conditions" name="details_conditions">{{ old('details_conditions', $package->details_conditions) }}</textarea>
            </div>
            
            <div class="admin-form-submit">
                <button type="submit" class="btn--success">Atualizar Pacote</button>
            </div>

        </form>
    </main>

@endsection