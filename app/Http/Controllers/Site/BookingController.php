<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // 1. LISTAR (Página Meus Pacotes)
    public function index()
    {
        // Busca apenas as reservas do usuário logado
        // O 'with' já traz os dados do pacote associado para não fazer muitas consultas
        $bookings = Booking::with('package')
                           ->where('user_id', Auth::id())
                           ->latest()
                           ->get();

        return view('site.bookings.index', compact('bookings'));
    }

    // 2. SALVAR (Ação do botão Reservar)
    public function store($packageId)
    {
        $package = Package::findOrFail($packageId);

        // Verifica se já não reservou esse mesmo pacote para não duplicar
        $exists = Booking::where('user_id', Auth::id())
                         ->where('package_id', $package->id)
                         ->exists();

        if ($exists) {
            return redirect()->route('bookings.index')->with('error', 'Você já reservou este pacote!');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'package_id' => $package->id,
            'status' => 'confirmed' // Como não tem pagamento real, já nasce confirmado
        ]);

        return redirect()->route('bookings.index')->with('success', 'Pacote adicionado ao seu avião! ✈️');
    }

    // 3. EXCLUIR (Botão de cancelar)
    public function destroy($id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Reserva cancelada com sucesso.');
    }
}