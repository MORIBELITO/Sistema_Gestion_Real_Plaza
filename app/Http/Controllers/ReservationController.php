<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Parking;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'parking_id' => 'required|exists:parkings,id',
            'reserved_at' => 'required|date',
        ]);

        Reservation::create([
            'user_id' => $request->input('user_id'),
            'parking_id' => $request->input('parking_id'),
            'reserved_at' => $request->input('reserved_at'),
        ]);

        return redirect()->route('parkings.index')->with('success', 'Reserva realizada con éxito.');
    }
}

