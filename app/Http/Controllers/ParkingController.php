<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Parking;

class ParkingController extends Controller
{
    // Lista todos los espacios de parqueo
    public function index()
    {
        $parkings = [
            ['id' => 1, 'zone' => 'A', 'available' => true],
            ['id' => 2, 'zone' => 'B', 'available' => false],
        ];

        return view('parkings.index', compact('parkings'));
    }

    // Muestra los detalles de un espacio de parqueo específico
    public function show($id)
    {
        $parking = ['id' => $id, 'zone' => 'A', 'available' => true];

        return view('parkings.show', compact('parking'));
    }

    // Reserva un espacio de parqueo
    public function reserve(Request $request)
    {
        $parkingId = $request->input('id');
        $zone = 'A'; // Puedes obtener la zona según el ID

        return view('parkings.reserve_success', compact('zone'));
    }

    // Muestra el estado de una reserva
    public function reservationStatus($id)
    {
        $reservation = [
            'id' => $id,
            'status' => 'reserved',
            'user_id' => 1,
            'zone' => 'A',
        ];

        return view('parkings.reservation_status', compact('reservation'));
    }



    public function available()
{
    // Obtener los espacios de parqueo que están disponibles
    $availableParkings = Parking::where('available', true)->get();

    return view('parkings.available', compact('availableParkings'));
}

public function markAsUnavailable($id)
{
    // Buscar el espacio de parqueo por ID
    $parking = Parking::findOrFail($id);

    // Marcarlo como no disponible
    $parking->available = false;
    $parking->save();

    return redirect()->route('parkings.index')->with('status', 'El espacio de parqueo ha sido marcado como no disponible.');
}

// app/Http/Controllers/ParkingController.php

public function update(Request $request, $id)
{
    // Validar los datos que vienen en la solicitud
    $request->validate([
        'zone' => 'required|string|max:255',
        'available' => 'required|boolean',
    ]);

    // Buscar el espacio de parqueo por ID
    $parking = Parking::findOrFail($id);

    // Actualizar los datos del espacio de parqueo
    $parking->zone = $request->input('zone');
    $parking->available = $request->input('available');
    $parking->save();

    return redirect()->route('parkings.index')->with('status', 'El espacio de parqueo ha sido actualizado.');
}

public function searchByZone(Request $request)
{
    // Validar el campo de búsqueda
    $request->validate([
        'zone' => 'required|string|max:255',
    ]);

    // Buscar espacios de parqueo en la zona especificada
    $zone = $request->input('zone');
    $parkings = Parking::where('zone', $zone)->get();

    return view('parkings.search_results', compact('parkings', 'zone'));
}

// app/Http/Controllers/ParkingController.php

public function filterAvailable()
{
    // Obtener los espacios de parqueo que están disponibles
    $availableParkings = Parking::where('available', true)->get();

    return view('parkings.available_list', compact('availableParkings'));
}

// app/Http/Controllers/ParkingController.php

public function countAvailable()
{
    // Contar cuántos espacios están disponibles
    $availableCount = Parking::where('available', true)->count();

    return view('parkings.available_count', compact('availableCount'));
}
}
