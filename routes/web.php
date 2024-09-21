<?php

use App\Http\Controllers\ParkingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Ruta para la página principal
Route::get('/', [HomeController::class, 'index']);

// Rutas para el sistema de parqueo
Route::controller(ParkingController::class)->group(function(){
    Route::get('parkings', 'index')->name('parkings.index'); // Nombrar la ruta como 'parkings.index'
    Route::get('parkings/{id}', 'show')->name('parkings.show'); // Nombrar la ruta como 'parkings.show'
    Route::post('parkings/reserve', 'reserve')->name('parkings.reserve'); // Nombrar la ruta como 'parkings.reserve'
    Route::get('parkings/reservations/{id}', 'reservationStatus')->name('parkings.reservationStatus'); // Nombrar la ruta como 'parkings.reservationStatus'
});
