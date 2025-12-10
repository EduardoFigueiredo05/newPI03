<div id="modal-login" class="modal-overlay" style="display: none; position: fixed; z-index: 9999;">
    <div class="modal-card">
        
        <button type="button" class="modal-close btn-close-login" aria-label="Fechar">
            <span class="material-icons">close</span>
        </button>
        
        <div class="modal-content-logo">
            <img src="{{ asset('img/3.png') }}" alt="Logo">
        </div>

        <div style="text-align: center; margin-bottom: 32px;">
            <h2 style="font-size: 24px; font-weight: bold; color: #131927;">Bem-vindo de volta</h2>
            <p style="color: #404040; font-size: 14px; margin-top: 8px;">Insira seus dados para desbloquear seu avião.</p>
        </div>

        <form class="admin-form" method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 16px;">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email_login">E-mail</label>
                <input class="form-input" type="email" id="email_login" name="email" value="{{ old('email') }}" required placeholder="admin@worldtour.com">
                @error('email')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password_login">Senha</label>
                <input class="form-input" type="password" id="password_login" name="password" required placeholder="••••••••">
                @error('password')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="button button--primary" style="width: 100%; margin-top: 8px;">
                Entrar e Desbloquear
            </button>

            <div style="text-align: center; margin-top: 16px; display: flex; flex-direction: column; gap: 12px;">
                <span style="color: #404040; font-size: 14px;">
                    Não tem conta? <a href="{{ route('register') }}" style="color: #364FC7; font-weight: 600; text-decoration: none;">Cadastre-se</a>
                </span>
            </div>

        </form>
    </div>
</div>