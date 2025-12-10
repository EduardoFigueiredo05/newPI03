@extends('layouts.site')

@section('title', $continent->name)

@section('content')

    <section class="section-img-pacote">
        <div>
            <h1 class="hero-title-secndary">{{ $continent->name }}</h1>
        </div>
        
        <div class="imgs-blocks">
            <div class="img-overlay-pacotes">
                <img class="img-block-1-pacotes" src="{{ asset($continent->image_cover) }}" alt="{{ $continent->name }}"
                     onerror="this.src='https://placehold.co/800x800?text={{ $continent->name }}'">
            </div>
            
            <div class="imgs-block-2">
                <div class="img-overlay-pacotes">
                    <img class="img-block-2-pacotes" src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?q=80&w=800" alt="Viagem">
                </div>
                <div class="img-overlay-pacotes">
                    <img class="img-block-2-pacotes" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800" alt="Viagem">
                </div>
            </div>
        </div>
    </section>

    <section class="section-pacotes-cards">
        <div class="hero-section-pacotes" style="background: transparent;">
            <h2 class="hero-title-secndary">Confira as melhores atrações de {{ $continent->name }}</h2>
            <p class="hero-subtitle-secndary">
                {{ $continent->description }}
            </p>
            
            <section class="cards-container-pacotes">
                @forelse($packages as $package)
                    <a href="{{ route('packages.show', $package->slug) }}" class="card-pacotes">
                        <div class="img-pacote">
                            <img src="{{ asset($package->image_main) }}" alt="{{ $package->title }}"
                                 onerror="this.src='https://placehold.co/600x400?text={{ $package->title }}'">
                        </div>
                        <h3>{{ $package->title }}</h3>
                        <p>{{ Str::limit($package->subtitle, 40) }}</p>
                    </a>
                @empty
                    <div style="width: 100%; text-align: center; grid-column: 1/-1;">
                        <p style="font-size: 18px; color: #666;">
                            Em breve teremos novos pacotes para {{ $continent->name }}!
                        </p>
                        <a href="{{ route('packages.index') }}" class="button button--primary" style="margin-top: 16px;">Ver outros destinos</a>
                    </div>
                @endforelse
            </section>

            <div class="hero-section-pacotes-contact">
                <p class="hero-subtitle-secndary">Não encontrou exatamente o que buscava? Nossa equipe está pronta para ajudar.</p>
                <div>
                    <button class="btn-check-more" type="button">Fale conosco</button>
                </div>
            </div>

        </div>
    </section>

@endsection