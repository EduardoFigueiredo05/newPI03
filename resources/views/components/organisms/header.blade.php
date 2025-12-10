<header {{ $attributes }}>
    <div class="home-header-container">
        
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('img/LogoBranca.png') }}" alt="World Tuor Logo" style="height: 35px; display: block;">
        </a>
        
        <nav class="home-nav">
            <a href="{{ route('home') }}" class="home-nav__link {{ request()->routeIs('home') ? 'home-nav__link--active' : '' }}">Home</a>
            <a href="{{ route('packages.index') }}" class="home-nav__link {{ request()->routeIs('packages.index') ? 'home-nav__link--active' : '' }}">Pacotes</a>
            
            @auth
                <a href="{{ route('bookings.index') }}" class="home-nav__link {{ request()->routeIs('bookings.index') ? 'home-nav__link--active' : '' }}">Carrinho</a>
            @endauth
        </nav>
        
        <div class="user-actions" style="display: flex; gap: 12px; align-items: center;">
            
            @auth
                <a href="{{ route('bookings.index') }}" class="user-button border-white" title="Meu Avião (Reservas)" style="text-decoration: none; display: flex; justify-content: center;">
                    <span class="material-icons" style="color: white;">flight_takeoff</span>
                </a>
            @else
                <button onclick="openLoginModal()" class="user-button border-white" title="Faça login para reservar">
                    <span class="material-icons" style="color: white;">flight_takeoff</span>
                </button>
            @endauth

            @auth
                <button id="btn-open-profile" class="user-button border-white" title="Meu Perfil">
                    <span class="material-icons" style="color: white;">person</span>
                </button>
            @else
                <button onclick="openLoginModal()" class="user-button border-white" style="cursor: pointer;" title="Entrar">
                    <span class="material-icons" style="color: white;">person</span>
                </button>
            @endauth

        </div>
    </div>
</header>