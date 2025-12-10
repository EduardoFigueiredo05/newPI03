<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\BookingController;
// IMPORTANTE: Adicione esta linha abaixo se não tiver!
use App\Http\Controllers\Site\PackageController; 

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// --- AQUI ESTÁ A ROTA QUE FALTAVA ---
// Essa linha cria o nome 'packages.index' que o botão da Home está procurando
Route::get('/pacotes', [PackageController::class, 'index'])->name('packages.index');

// Rota para ver um pacote específico
Route::get('/pacote/{slug}', [PackageController::class, 'show'])->name('packages.show');

// Rota para ver um continente (adicionaremos no próximo passo, mas já pode deixar aqui)
Route::get('/destinos/{slug}', [PackageController::class, 'continent'])->name('continents.show');


// --- ROTAS PROTEGIDAS (Meus Pacotes, etc) ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('bookings.index');
    })->name('dashboard');

    Route::get('/meus-pacotes', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/reservar/{id}', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/reservar/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';