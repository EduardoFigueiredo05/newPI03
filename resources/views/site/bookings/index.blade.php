@extends('layouts.site')

@section('title', 'Meus Pacotes')

@section('content')

    <div class="page-header-container">
        <h1 class="page-header-title">Meus pacotes</h1>
    </div>

    <main class="container inner-content-box">
        <section class="packages-section">
            
            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="packages-list">
                @forelse($bookings as $booking)
                    <div class="card-wrapper">
                        <article class="travel-card">
                            
                            <div class="travel-card__body">
                                <div class="travel-card__image-container">
                                    <img src="{{ $booking->package->image_main }}" alt="{{ $booking->package->title }}"
                                         onerror="this.src='https://placehold.co/600x400?text=Sem+Imagem'">
                                </div>
                                
                                <div class="travel-card__content">
                                    <h3 class="travel-card__title">{{ $booking->package->title }}</h3>
                                    <p class="travel-card__description">
                                        {{ Str::limit($booking->package->subtitle, 80) }}
                                    </p>
                                    
                                    <div class="card-status">
                                        <span class="badge" style="background: #E6F7F2; color: #00875F; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; display: flex; align-items: center; gap: 6px;">
                                            <span class="material-icons" style="font-size: 14px;">check_circle</span>
                                            Pacote confirmado
                                        </span>
                                    </div>
                                </div>

                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="margin-right: 24px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button button--danger btn--excluir" title="Cancelar viagem">
                                        Excluir
                                    </button>
                                </form>
                            </div>

                        </article>
                    </div>
                @empty
                    <div style="text-align: center; padding: 60px 20px;">
                        <span class="material-icons" style="font-size: 48px; color: #ccc; margin-bottom: 16px;">flight_takeoff</span>
                        <h3 style="color: #666;">Seu avião está vazio!</h3>
                        <p style="color: #999; margin-bottom: 24px;">Que tal escolher seu próximo destino?</p>
                        <a href="{{ route('packages.index') }}" class="button button--primary">Explorar Pacotes</a>
                    </div>
                @endforelse
            </div>
        </section>
    </main>

@endsection