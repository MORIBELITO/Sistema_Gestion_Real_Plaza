<!-- resources/views/parkings/reservation_status.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Estado de la Reserva</h1>

    <p>ID Reserva: {{ $reservation['id'] }}</p>
    <p>Zona: {{ $reservation['zone'] }}</p>
    <p>Estado: {{ $reservation['status'] }}</p>
    <p>Usuario: {{ $reservation['user_id'] }}</p>

    <a href="{{ route('parkings.index') }}">Volver a la lista de parqueos</a>
@endsection
