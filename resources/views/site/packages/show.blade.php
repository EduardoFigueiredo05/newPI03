@extends('layouts.site')

@section('title', $package->title)

@section('content')

    <section class="section-img-pacote">
        <img src="{{ asset($package->image_main) }}" alt="{{ $package->title }}" onerror="this.src='https://placehold.co/1200x800?text=Imagem+Pacote'">
        <div class="hero-title-secndary">
            <h1>{{ $package->title }}</h1>
            <p style="font-size: 1.2rem; opacity: 0.9;">{{ $package->subtitle }}</p>
        </div>
    </section>

    <section class="section-pacote-infs" x-data="{ activeTab: 'itinerary' }" style="padding-bottom: 120px;">
        
        <div style="display: flex; gap: 20px; margin-bottom: 30px; color: #666; font-weight: 500;">
            <div style="display: flex; align-items: center; gap: 5px;">
                <span class="material-icons" style="color: var(--primary);">calendar_today</span>
                {{ $package->days }} Dias
            </div>
            <div style="display: flex; align-items: center; gap: 5px;">
                <span class="material-icons" style="color: var(--primary);">nights_stay</span>
                {{ $package->nights }} Noites
            </div>
            <div style="display: flex; align-items: center; gap: 5px;">
                <span class="material-icons" style="color: var(--primary);">public</span>
                {{ $package->country->name ?? 'Destino Internacional' }}
            </div>
        </div>

        <div class="section-pacote-infs-button">
            <button type="button" @click="activeTab = 'itinerary'" :class="{ 'active': activeTab === 'itinerary' }">
                Itinerário
            </button>
            <button type="button" @click="activeTab = 'included'" :class="{ 'active': activeTab === 'included' }">
                O que inclui
            </button>
            <button type="button" @click="activeTab = 'conditions'" :class="{ 'active': activeTab === 'conditions' }">
                Condições
            </button>
        </div>

        <div x-show="activeTab === 'itinerary'" style="line-height: 1.8; color: #444;">
            <h3 style="margin-bottom: 15px;">Roteiro da Viagem</h3>
            <p>{!! nl2br(e($package->details_itinerary ?? 'Roteiro detalhado em breve.')) !!}</p>
        </div>

        <div x-show="activeTab === 'included'" style="display: none; line-height: 1.8; color: #444;" x-show.important="activeTab === 'included'">
            <h3 style="margin-bottom: 15px;">Inclusões</h3>
            <p>{!! nl2br(e($package->details_included ?? 'Consulte itens inclusos.')) !!}</p>
        </div>

        <div x-show="activeTab === 'conditions'" style="display: none; line-height: 1.8; color: #444;" x-show.important="activeTab === 'conditions'">
            <h3 style="margin-bottom: 15px;">Condições Gerais</h3>
            <p>{!! nl2br(e($package->details_conditions ?? 'Consulte as regras de cancelamento.')) !!}</p>
        </div>

    </section>

    <div class="reserve-now">
        <div>
            <span style="display: block; font-size: 0.9rem; color: #666;">Preço por pessoa</span>
            <h2 style="color: var(--primary); margin: 0;">R$ {{ number_format($package->price, 2, ',', '.') }}</h2>
        </div>

        @auth
            <form action="{{ route('bookings.store', $package->id) }}" method="POST">
                @csrf
                <button type="submit" class="button--primary" style="padding: 12px 30px; font-size: 1.1rem; border-radius: 50px;">
                    Reservar Agora
                </button>
            </form>
        @else
            <button type="button" onclick="openLoginModal()" class="button--primary" style="padding: 12px 30px; font-size: 1.1rem; border-radius: 50px;">
                Login para Reservar
            </button>
        @endauth
    </div>

@endsection