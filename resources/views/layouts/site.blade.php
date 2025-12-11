<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Tuor - @yield('title', 'Home')</title>
    
    <link rel="stylesheet" href="{{ asset('css/client.css') }}">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>

    @if(request()->routeIs('home'))
        <x-organisms.header class="home-header" />
    @else
        <x-organisms.header class="home-header-blue" />
    @endif

    <main>
        @yield('content')
    </main>

    <x-organisms.footer />


    @auth
    <div class="popup-overlay" id="popup-perfil" style="display: none;">
        <div class="popup-container">
            
            <button class="btn-close">
                <span class="material-symbols-outlined">close</span>
            </button>
            
            <div class="popup-header">
                <img src="{{ asset('img/3.png') }}" alt="World Tour" class="popup-logo">
            </div>
            
            <div class="popup-form">
                <div class="form-group-icon">
                    <label class="form-label">Nome</label>
                    <div class="input-wrapper">
                        <span class="input-icon material-symbols-outlined">person</span>
                        <input type="text" class="form-input" value="{{ Auth::user()->name }}" readonly>
                    </div>
                </div>
                
                <div class="form-group-icon">
                    <label class="form-label">Email</label>
                    <div class="input-wrapper has-right-icon">
                        <span class="input-icon material-symbols-outlined">mail</span>
                        <input type="email" class="form-input" value="{{ Auth::user()->email }}" readonly>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                    @csrf
                    <button type="submit" class="button button--danger" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                        <span class="material-symbols-outlined" style="margin-right: 8px;">logout</span>
                        Sair
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endauth


    @guest
    <div class="modal-overlay" id="modal-login" style="display: none;">
        <div class="modal-card">
            
            <button type="button"  class="modal-close btn-close-login" aria-label="Fechar">
                <span class="material-symbols-outlined">close</span>
            </button>
            
            <div class="modal-content-logo">
                <img src="{{ asset('img/3.png') }}" alt="Logo">
            </div>

            <div style="text-align: center; margin-bottom: 32px;">
                <h2 style="font-size: 24px; font-weight: bold; color: var(--color-text-dark);">Bem-vindo de volta</h2>
                <p style="color: var(--color-text-secondary); font-size: 14px; margin-top: 8px;">Faça login para reservar viagens.</p>
            </div>

            <form class="admin-form" method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 16px;">
                @csrf
                <div class="form-group">
                    <label class="form-label">E-mail</label>
                    <input class="form-input" type="email" name="email" required placeholder="admin@worldtour.com">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Senha</label>
                    <input class="form-input" type="password" name="password" required placeholder="••••••••">
                </div>

                <button type="submit" class="button button--primary" style="width: 100%; margin-top: 8px;">Entrar</button>
                
                <div style="text-align: center; margin-top: 16px;">
                    <span style="color: var(--color-text-secondary); font-size: 14px;">
                        Não tem conta? <a href="{{ route('register') }}" style="color: var(--color-brand-blue); font-weight: 600; text-decoration: none;">Cadastre-se</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
    @endguest


    <script>
        // --- 1. LÓGICA DO PERFIL (LOGADO) ---
        const btnProfile = document.getElementById('btn-open-profile');
        const modalProfile = document.getElementById('popup-perfil');
        
        if (btnProfile && modalProfile) {
            btnProfile.addEventListener('click', (e) => { 
                e.preventDefault(); 
                modalProfile.style.display = 'flex'; 
            });
            
            const btnCloseProfile = modalProfile.querySelector('.btn-close');
            if (btnCloseProfile) {
                btnCloseProfile.addEventListener('click', () => { 
                    modalProfile.style.display = 'none'; 
                });
            }

            window.addEventListener('click', (e) => { 
                if (e.target === modalProfile) modalProfile.style.display = 'none'; 
            });
        }

        // --- 2. LÓGICA DO LOGIN (DESLOGADO) ---
        function openLoginModal() {
            const modal = document.getElementById('modal-login');
            if(modal) modal.style.display = 'flex';
        }

        function closeLoginModal() {
            const modal = document.getElementById('modal-login');
            if(modal) modal.style.display = 'none';
        }

        const btnCloseLogin = document.querySelector('.btn-close-login');
        if(btnCloseLogin) {
            btnCloseLogin.addEventListener('click', closeLoginModal);
        }

        const modalLogin = document.getElementById('modal-login');
        if(modalLogin) {
            window.addEventListener('click', (e) => {
                if (e.target === modalLogin) closeLoginModal();
            });
        }
    </script>

    @if($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                openLoginModal();
            });
        </script>
    @endif

</body>
</html>