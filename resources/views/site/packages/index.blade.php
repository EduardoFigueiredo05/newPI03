@extends('layouts.site')

@section('title', 'Nossos Destinos')

@section('content')

    <section class="hero-section" style="height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1600');">
        <div class="hero-content">
            <h1 class="hero-title">Explore o Mundo</h1>
            <p class="hero-subtitle">Escolha seu continente e comece sua jornada.</p>
        </div>
    </section>

    <section class="cards-container">
        <h2 style="text-align: center; margin-bottom: 20px;">Nossos Destinos</h2>
        <p style="text-align: center; color: #666; margin-bottom: 50px; max-width: 700px; margin-left: auto; margin-right: auto;">
            De praias paradisíacas a metrópoles futuristas. Navegue por nossas coleções organizadas por continente.
        </p>

        <div class="cards">
            @foreach($continents as $continent)
                <div class="card">
                    <div class="img-card">
                        <img src="{{ asset($continent->image_cover) }}" 
                             alt="{{ $continent->name }}"
                             onerror="this.src='https://placehold.co/600x400?text={{ $continent->name }}'">
                    </div>
                    <div class="content-card">
                        <h3 class="card-title">{{ $continent->name }}</h3>
                        <p class="card-description">{{ Str::limit($continent->description, 60) }}</p>
                        
                        <a href="{{ route('continents.show', $continent->slug) }}" class="card-link">
                            Explorar {{ $continent->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection