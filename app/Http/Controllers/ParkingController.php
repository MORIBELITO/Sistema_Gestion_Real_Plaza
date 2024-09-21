<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
