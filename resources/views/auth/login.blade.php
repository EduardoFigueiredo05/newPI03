<x-guest-layout>
    
    <div class="modal-overlay" style="position: fixed; display: flex;">
        <div class="modal-card">
            
            <a href="{{ route('home') }}" class="modal-close" aria-label="Fechar">
                <span class="material-symbols-outlined">close</span>
            </a>
            
            <div class="modal-content-logo">
                <img src="{{ asset('img/3.png') }}" alt="Logo">
            </div>

            <div style="text-align: center; margin-bottom: 32px;">
                <h2 style="font-size: 24px; font-weight: bold; color: #131927;">Bem-vindo de volta</h2>
                <p style="color: #404040; font-size: 14px; margin-top: 8px;">Insira seus dados para acessar sua conta.</p>
            </div>

            <form class="admin-form" method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 16px;">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">E-mail</label>
                    <input class="form-input" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@worldtour.com">
                    @error('email')
                        <span style="color: red; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Senha</label>
                    <input class="form-input" type="password" id="password" name="password" required placeholder="••••••••">
                    @error('password')
                        <span style="color: red; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="button button--primary" style="width: 100%; margin-top: 8px;">
                    Entrar
                </button>

                <div style="text-align: center; margin-top: 16px; display: flex; flex-direction: column; gap: 12px;">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color: #404040; font-size: 14px; text-decoration: none;">Esqueci minha senha</a>
                    @endif
                    
                    <span style="color: #404040; font-size: 14px;">
                        Não tem conta? <a href="{{ route('register') }}" style="color: #364FC7; font-weight: 600; text-decoration: none;">Cadastre-se</a>
                    </span>
                </div>

            </form>
        </div>
    </div>

</x-guest-layout>