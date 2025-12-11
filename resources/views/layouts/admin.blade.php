<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - World Tour</title>
    
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body> 

    <header class="admin-header">
        <div style="display: flex; align-items: center; gap: 40px;">
            <h1 class="admin-header__logo">World Tour Admin</h1> 
            
            <nav class="admin-header__nav">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-button {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.packages.create') }}" class="admin-nav-button {{ request()->routeIs('admin.packages.create') ? 'active' : '' }}">Novo Pacote</a>
            </nav>
        </div>
        
        <div style="display: flex; align-items: center; gap: 16px;">
            <span style="color: rgba(255,255,255,0.7); font-size: 0.9rem;">Olá, Admin</span>
            <div class="admin-user-icon">
                <span class="material-icons" style="color: white; font-size: 20px;">person</span>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>World Tour &copy; {{ date('Y') }} - Painel Administrativo</p>
        
        <form method="POST" action="{{ route('logout') }}" style="margin-top: 10px;">
            @csrf
            <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; text-decoration: underline; font-size: 0.85rem;">
                Sair do Sistema
            </button>
        </form>
    </footer>

</body>
</html>