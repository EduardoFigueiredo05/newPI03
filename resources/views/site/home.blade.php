@extends('layouts.site')

@section('title', 'Home')

@section('content')

    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Descubra o Mundo com a World Tuor</h1>
            <p class="hero-subtitle">Explore destinos incríveis e viva experiências inesquecíveis.</p>                
            <a href="{{ route('packages.index') }}" class="button button--primary">Ver Pacotes</a>
        </div>
    </section>

    <section class="cards-container">
        <h2 style="text-align: center; margin-bottom: 40px;">Nossos Melhores Pacotes</h2>
        
        <div class="cards">
            @forelse($featuredPackages as $package)
                <div class="card">
                    <div class="img-card">
                        <img 
                            src="{{ asset($package->image_main) }}" 
                            alt="{{ $package->title }}" 
                            onerror="this.removeAttribute('onerror'); this.src='https://placehold.co/600x400?text=Sem+Imagem';"
                        > 
                    </div>
                    <div class="content-card">
                        <h3 class="card-title">{{ $package->title }}</h3>
                        <p class="card-description">{{ Str::limit($package->subtitle, 45) }}</p>
                        
                        <a class="card-link" href="{{ route('packages.show', $package->slug) }}">
                            Ver mais detalhes
                        </a>
                    </div>
                </div>
            @empty
                <p style="text-align: center; width: 100%; grid-column: 1/-1;">Nenhum pacote em destaque no momento.</p>
            @endforelse
        </div>
    </section>

    <section class="cards-container" style="background-color: #f8f9fa;">
        <h2 class="features-title">Por que viajar com a gente?</h2>
        <div class="cards">
            <div class="card" style="align-items: center; text-align: center; padding: 40px;">
                <span class="material-icons" style="font-size: 40px; color: var(--primary); margin-bottom: 16px;">public</span>
                <h3>Destinos Selecionados</h3>
                <p>Roteiros escolhidos a dedo pelos nossos especialistas.</p>
            </div>
            <div class="card" style="align-items: center; text-align: center; padding: 40px;">
                <span class="material-icons" style="font-size: 40px; color: var(--primary); margin-bottom: 16px;">verified</span>
                <h3>Reserva Fácil</h3>
                <p>Sistema acadêmico simplificado para sua experiência.</p>
            </div>
            <div class="card" style="align-items: center; text-align: center; padding: 40px;">
                <span class="material-icons" style="font-size: 40px; color: var(--primary); margin-bottom: 16px;">favorite</span>
                <h3>Experiências Únicas</h3>
                <p>Criamos memórias que duram para sempre.</p>
            </div>
        </div>
    </section>

@endsection