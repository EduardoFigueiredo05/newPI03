<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - World Tour</title>
    
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body style="background-color: var(--color-background-section);"> 

    <header class="admin-header">
        <div class="admin-header-container">
            <h1 class="admin-header__logo">World Tour</h1> 
            
            <nav class="admin-header__nav">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-button">View Adm</a>
                <a href="#" class="admin-nav-button">Adicionar Pacotes</a>
                <a href="#" class="admin-nav-button">Adicionar Categoria</a>
            </nav>
            
            <div class="admin-user-icon">
                <span class="material-icons" style="color: white;">person</span>
            </div>
        </div>
    </header>

    <main class="container-admin" style="padding-top: 40px; padding-bottom: 40px; min-height: 80vh;">
        @yield('content')
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h2 class="logo">World Tour</h2>
                <p class="footer-description">Painel Administrativo.</p>
            </div>
            <div class="footer-column">
                <h4 class="footer-title">Suporte</h4>
                <ul class="footer-list">
                    <li><p>suporte@worldtour.com</p></li>
                </ul>
            </div>
            <div class="footer-column">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; cursor: pointer; text-decoration: underline;">
                        Sair do Painel
                    </button>
                </form>
            </div>
        </div>
    </footer>

</body>
</html>