<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PackageController;
use App\Http\Controllers\Site\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPackageController;
use Illuminate\Support\Facades\Route;

// ==============================================================================
// 1. ÁREA PÚBLICA (Acesso Livre)
// ==============================================================================

// Home Page (Página Inicial)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Listagem Geral de Pacotes (Menu "Pacotes" -> Lista os Continentes)
Route::get('/pacotes', [PackageController::class, 'index'])->name('packages.index');

// Página de um Continente Específico (Ex: /destinos/europa)
Route::get('/destinos/{slug}', [PackageController::class, 'continent'])->name('continents.show');

// Detalhes do Pacote (Ex: /pacote/trip-europa-madri)
Route::get('/pacote/{slug}', [PackageController::class, 'show'])->name('packages.show');


// ==============================================================================
// 2. ÁREA DO CLIENTE (Requer Login)
// Middleware: 'auth' e 'verified'
// ==============================================================================

Route::middleware(['auth', 'verified'])->group(function () {

    // Redirecionamento do Dashboard padrão
    // Quando o usuário loga, ele é jogado para a lista de compras dele
    Route::get('/dashboard', function () {
        return redirect()->route('bookings.index');
    })->name('dashboard');

    // --- MEU AVIÃO (CARRINHO DE RESERVAS) ---
    
    // Listar minhas reservas (Tela "Meus Pacotes")
    Route::get('/meus-pacotes', [BookingController::class, 'index'])->name('bookings.index');
    
    // Fazer uma reserva (Ação do botão "Reservar Agora")
    Route::post('/reservar/{id}', [BookingController::class, 'store'])->name('bookings.store');
    
    // Cancelar uma reserva (Botão "Excluir")
    Route::delete('/reservar/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    // --- PERFIL DO USUÁRIO (Gerado pelo Breeze) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==============================================================================
// 3. ÁREA ADMINISTRATIVA (Apenas Usuário Master)
// ==============================================================================

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Geral (Tabelas de resumo)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // --- CRUD DE PACOTES (NOVAS ROTAS) ---
    Route::get('/pacotes/novo', [AdminPackageController::class, 'create'])->name('packages.create');
    Route::post('/pacotes/salvar', [AdminPackageController::class, 'store'])->name('packages.store');
    Route::get('/pacotes/{id}/editar', [AdminPackageController::class, 'edit'])->name('packages.edit');
    Route::put('/pacotes/{id}', [AdminPackageController::class, 'update'])->name('packages.update'); // PUT é para atualização
    Route::delete('/pacotes/{id}', [AdminPackageController::class, 'destroy'])->name('packages.destroy'); // DELETE é para exclusão
});


// ==============================================================================
// 4. ROTAS DE AUTENTICAÇÃO (Login, Registro, Recuperar Senha)
// Carregadas automaticamente pelo Laravel Breeze
// ==============================================================================
require __DIR__.'/auth.php';