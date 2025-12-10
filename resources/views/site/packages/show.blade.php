@extends('layouts.site')

@section('title', $package->title)

@section('content')

    <section class="section-img-pacote">
        <div class="imgs-blocks">
            <div class="img-overlay-pacotes">
                <img class="img-block-1-pacotes" src="{{ asset($package->image_main) }}" alt="{{ $package->title }}">
            </div>
            
            <div class="imgs-block-2">
                <div class="img-overlay-pacotes">
                   <img class="img-block-2-pacotes" src="{{ asset('img/exemplo-2.jpg') }}" alt="Detalhe">
                </div>
                <div class="img-overlay-pacotes">
                   <img class="img-block-2-pacotes" src="{{ asset('img/exemplo-3.jpg') }}" alt="Detalhe">
                </div>
            </div>
        </div>
        <div>
            <h1 class="hero-title-secndary">{{ $package->title }}</h1>
            <p class="hero-subtitle-secndary">{{ $package->subtitle }}</p>
        </div>
    </section>

    <section class="section-pacote-infs" x-data="{ activeTab: 'itinerary' }">
        
        <p class="package-duration">
            <span class="material-icons">calendar_today</span> 
            {{ $package->days }} dias / {{ $package->nights }} noites
        </p>

        <div class="section-pacote-infs-button">
            <button type="button" 
                @click="activeTab = 'itinerary'" 
                :class="{ 'active': activeTab === 'itinerary' }">
                Itinerário
            </button>
            <button type="button" 
                @click="activeTab = 'included'" 
                :class="{ 'active': activeTab === 'included' }">
                O que inclui
            </button>
            <button type="button" 
                @click="activeTab = 'conditions'" 
                :class="{ 'active': activeTab === 'conditions' }">
                Condições
            </button>
        </div>

        <div x-show="activeTab === 'itinerary'" class="Intinerario" style="display: block">
            <p>{{ $package->details_itinerary ?? 'Roteiro a definir.' }}</p>
        </div>

        <div x-show="activeTab === 'included'" class="Oque-inclui" style="display: block">
            <p>{{ $package->details_included ?? 'Consulte inclusões.' }}</p>
        </div>

        <div x-show="activeTab === 'conditions'" class="Condicoes-gerais" style="display: block">
            <p>{{ $package->details_conditions ?? 'Consulte condições.' }}</p>
        </div>
    </section>

    <section class="reserve-now">
        <h2>Reserve agora sua viagem!</h2>
        
        <p>R$ {{ number_format($package->price, 2, ',', '.') }}</p>
        <p>por pessoa</p>

        @auth
            <form action="{{route('bookings.store',$package->id)}}" method="POST">
                @csrf
                <button type="submit">Reservar agora</button>
            </form>
        @else
            <a href="{{ route('login') }}">
                <button type="button">Faça Login para Reservar</button>
            </a>
        @endauth

        <p><i class="material-icons">check</i>Cancelamento Grátis (até 7 dias antes)</p>
        <p><i class="material-icons">chat</i>Fale com um especialista</p>
    </section>

@endsection