<?php

use App\Http\Controllers\ParkingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

// Ruta para la página principal
Route::get('/', [HomeController::class, 'index']);

// Rutas para el sistema de parqueo
Route::controller(ParkingController::class)->group(function(){
    Route::get('parkings', 'index')->name('parkings.index'); // Nombrar la ruta como 'parkings.index'
    Route::get('parkings/{id}', 'show')->name('parkings.show'); // Nombrar la ruta como 'parkings.show'
    Route::post('parkings/reserve', 'reserve')->name('parkings.reserve'); // Nombrar la ruta como 'parkings.reserve'
    Route::get('parkings/reservations/{id}', 'reservationStatus')->name('parkings.reservationStatus'); // Nombrar la ruta como 'parkings.reservationStatus'
});

Route::get('/parkings/available', [ParkingController::class, 'available'])->name('parkings.available');
Route::patch('/parkings/{id}/unavailable', [ParkingController::class, 'markAsUnavailable'])->name('parkings.unavailable');
Route::put('/parkings/{id}', [ParkingController::class, 'update'])->name('parkings.update');
Route::get('/parkings/search', [ParkingController::class, 'searchByZone'])->name('parkings.search');

Route::get('/parkings/available', [ParkingController::class, 'filterAvailable'])->name('parkings.filterAvailable');

