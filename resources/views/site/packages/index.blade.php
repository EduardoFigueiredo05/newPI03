@extends('layouts.site')

@section('title', 'Nossos Destinos')

@section('content')

    <section class="img-map">
        <div class="img-map-wrapper"
             style="background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.74)), url('https://images.unsplash.com/photo-1723306744533-bed5a4f696dc?q=80&w=1589');">
            <div class="img-map-overlay">
                <h1 class="hero-title">O mundo está ao seu alcance</h1>
                <p class="hero-subtitle">Sua próxima aventura começa aqui.</p>
            </div>
        </div>
    </section>

    <main>
        <section class="section-pacotes">
            <div class="header-pacotes">
                <h1 class="hero-title color-secondary">Explore por Continentes</h1>
                <div class="section-text-pacotes">
                    <p class="hero-subtitle color-secondary">
                        De ruínas antigas a metrópoles futuristas, cada continente oferece uma experiência única. 
                        Navegue por nossas coleções e encontre o roteiro que mais combina com seu espírito aventureiro.
                    </p>
                </div>
            </div>

            <section class="cards-container-pacotes">
                @foreach($continents as $continent)
                    <a href="{{ route('continents.show', $continent->slug) }}" class="card-pacotes">
                        <div class="img-pacote">
                            <img src="{{ asset($continent->image_cover) }}" 
                                 alt="{{ $continent->name }}"
                                 onerror="this.src='https://placehold.co/600x400?text={{ $continent->name }}'">
                        </div>
                        <h3>{{ $continent->name }}</h3>
                        <p>{{ Str::limit($continent->description, 50) }}</p>
                    </a>
                @endforeach
            </section>

            <div class="header-pacotes" style="margin-top: 60px;">
                <h1 class="hero-title color-secondary">Procurando um roteiro 100% personalizado?</h1>
                <div class="section-text-pacotes">
                    <p class="hero-subtitle color-secondary">
                        Não encontrou exatamente o que buscava? Nossa equipe de especialistas está pronta para desenhar uma aventura sob medida.
                    </p>
                </div>
                <button class="btn-check-more" type="button" onclick="alert('Funcionalidade em breve!')">Fale com um Consultor</button>
            </div>
        </section>
    </main>

@endsection