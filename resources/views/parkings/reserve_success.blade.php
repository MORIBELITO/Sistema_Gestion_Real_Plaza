<!-- resources/views/parkings/reserve_success.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Reserva Exitosa</h1>

    <p>Has reservado exitosamente el espacio de parqueo en la zona {{ $zone }}.</p>
    <a href="{{ route('parkings.index') }}">Volver a la lista de parqueos</a>
@endsection
