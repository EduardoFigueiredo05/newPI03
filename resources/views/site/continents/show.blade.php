@extends('layouts.site')

@section('title', $continent->name)

@section('content')

    <section class="hero-section" style="height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6)), url('{{ $continent->image_cover }}');">
        <div class="hero-content">
            <h1 class="hero-title">{{ $continent->name }}</h1>
            <p class="hero-subtitle">{{ $continent->description }}</p>
        </div>
    </section>

    <section class="cards-container">
        <h2 style="text-align: center; margin-bottom: 40px;">Pacotes Disponíveis</h2>

        <div class="cards">
            @forelse($packages as $package)
                <div class="card">
                    <div class="img-card">
                        <img src="{{ asset($package->image_main) }}" 
                             alt="{{ $package->title }}"
                             onerror="this.src='https://placehold.co/600x400?text={{ $package->title }}'">
                    </div>
                    <div class="content-card">
                        <h3 class="card-title">{{ $package->title }}</h3>
                        <p class="card-description">{{ Str::limit($package->subtitle, 45) }}</p>
                        
                        <a href="{{ route('packages.show', $package->slug) }}" class="card-link">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 40px;">
                    <span class="material-icons" style="font-size: 48px; color: #ccc;">sentiment_dissatisfied</span>
                    <p style="color: #666; margin-top: 10px;">Ainda não temos pacotes cadastrados para {{ $continent->name }}.</p>
                    <a href="{{ route('packages.index') }}" class="button button--primary" style="margin-top: 20px;">Ver outros destinos</a>
                </div>
            @endforelse
        </div>
    </section>

@endsection