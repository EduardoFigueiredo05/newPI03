@extends('layouts.site')

@section('title', 'Home')

@section('content')

    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Descubra o Mundo com a World Tuor</h1>
            <p class="hero-subtitle">Explore destinos incríveis e viva experiências inesquecíveis. Na World Tuor, sua próxima grande aventura começa com uma simples reserva.</p>                
            <a href="{{ route('packages.index') }}" class="button button--primary">Ver Pacotes</a>
        </div>
    </section>

    <section class="features-section">
        <h2 class="features-title">POR QUE RESERVAR COM A WORLD TUOR</h2>
        <div class="features-grid">
            <div class="feature-item">
                <h3 class="feature-item__title">Destinos Selecionados</h3>
                <p class="feature-item__text">Nossos especialistas escolheram a dedo os melhores roteiros nacionais e internacionais.</p>
            </div>
            <div class="feature-item">
                <h3 class="feature-item__title">Reserva Fácil</h3>
                <p class="feature-item__text">Sem burocracia. Nosso sistema de reserva acadêmico é simples.</p>
            </div>
            <div class="feature-item">
                <h3 class="feature-item__title">Viva a Experiência</h3>
                <p class="feature-item__text">Mais do que uma viagem, oferecemos a chance de criar memórias inesquecíveis.</p>
            </div>
        </div>
    </section>

    <section class="features-section cards-container">
        <h2 class="hero-title" style="color: var(--color-white); margin-bottom: 32px;">Nossos Melhores Pacotes</h2>
        
        <div class="cards">
            @forelse($featuredPackages as $package)
                <div class="card">
                    <div class="img-card">
                        <img 
                            src="{{ asset($package->image_main) }}" 
                            alt="{{ $package->title }}" 
                            style="width: 100%; height: 100%; object-fit: cover;"
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
                <p style="color: white; text-align: center; width: 100%;">Nenhum pacote em destaque no momento.</p>
            @endforelse
        </div>
    </section>

    <section class="atrative-section">
        <div class="atrative-section-top">
            <h2 class="black-title">Como nosso sistema funciona</h2>
            <p>Focamos na experiência de descoberta. Sem pagamentos, apenas reservas.</p>
        </div>
        
        <div class="atrative-section-cards cards">
            <div class="atrative-card">
                <h3 class="atrative-card-title">1. Escolha</h3>
                <p class="card-text">Navegue por destinos incríveis.</p>
            </div>
            <div class="atrative-card">
                <h3 class="atrative-card-title">2. Reserve</h3>
                <p class="card-text">Garanta sua vaga rapidamente.</p>
            </div>
            <div class="atrative-card">
                <h3 class="atrative-card-title">3. Viaje</h3>
                <p class="card-text">Prepare-se para a aventura.</p>
            </div>
        </div>

        <div class="atrative-imgs">
            <h2 class="black-title">Conte com a nossa experiência</h2>
            <div class="imgs-blocks">
                <div class="img-overlay">
                    <img class="img-block-1" src="{{ asset('img/exemplo-1.jpg') }}" alt="Experiência 1"
                         onerror="this.removeAttribute('onerror'); this.src='https://placehold.co/480x720?text=Experiencia+1';">
                    
                    <div class="img-overlay__text">
                        <h3>Descubra o mundo</h3>
                        <p>Um pôr do sol de cada vez.</p>
                    </div>
                </div>
                <div class="imgs-block-2">
                    <div class="img-overlay img-overlay--small">
                        <img class="img-block-2" src="{{ asset('img/exemplo-2.jpg') }}" alt="Experiência 2"
                             onerror="this.removeAttribute('onerror'); this.src='https://placehold.co/480x358?text=Experiencia+2';">
                    </div>
                    <div class="img-overlay img-overlay--small">
                        <img class="img-block-2" src="{{ asset('img/exemplo-3.jpg') }}" alt="Experiência 3"
                             onerror="this.removeAttribute('onerror'); this.src='https://placehold.co/480x358?text=Experiencia+3';">
                    </div>
                </div>
            </div>
            <button class="btn-check-more" onclick="alert('Página de contato em construção!')">Entre em Contato</button>
        </div>
    </section>

@endsection