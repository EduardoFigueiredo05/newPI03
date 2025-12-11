@extends('layouts.site')

@section('title', 'Meus Pacotes')

@section('content')

    <div class="page-header-container" style="background: transparent; padding-top: 100px;">
        <h1 class="page-header-title" style="color: var(--dark);">Meus Pacotes</h1>
    </div>

    <main class="inner-content-box" style="padding: 20px 10%; max-width: 1000px; margin: 0 auto;">
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="packages-list">
            @forelse($bookings as $booking)
                <div class="travel-card">
                    <div class="travel-card__body">
                        <div class="travel-card__image-container">
                            <img src="{{ asset($booking->package->image_main) }}" 
                                 alt="{{ $booking->package->title }}"
                                 onerror="this.src='https://placehold.co/600x400?text=Sem+Imagem'">
                        </div>
                        
                        <div class="travel-card__content">
                            <h3 class="travel-card__title">{{ $booking->package->title }}</h3>
                            <p class="travel-card__description">
                                {{ Str::limit($booking->package->subtitle, 80) }}
                            </p>
                            
                            <div style="margin-top: 10px;">
                                <span class="badge-status">
                                    <span class="material-icons" style="font-size: 14px;">check_circle</span>
                                    Pacote confirmado
                                </span>
                            </div>
                        </div>

                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button btn--excluir" title="Cancelar viagem" onclick="return confirm('Tem certeza que deseja cancelar esta reserva?');">
                                <span class="material-icons" style="font-size: 18px;">delete</span>
                                Cancelar
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 12px; box-shadow: var(--shadow);">
                    <span class="material-icons" style="font-size: 64px; color: #ccc; margin-bottom: 16px;">flight_takeoff</span>
                    <h3 style="color: #666; margin-bottom: 10px;">Seu avião está vazio!</h3>
                    <p style="color: #999; margin-bottom: 24px;">Você ainda não reservou nenhuma viagem.</p>
                    <a href="{{ route('packages.index') }}" class="button button--primary">Explorar Destinos</a>
                </div>
            @endforelse
        </div>

    </main>

@endsection