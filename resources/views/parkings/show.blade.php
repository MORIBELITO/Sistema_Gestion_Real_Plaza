<!-- resources/views/parkings/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalles del Espacio de Parqueo</h1>

    <p>Zona: {{ $parking['zone'] }}</p>
    <p>Disponible: {{ $parking['available'] ? 'Sí' : 'No' }}</p>

    @if($parking['available'])
        <form action="{{ route('parkings.reserve') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $parking['id'] }}">
            <input type="hidden" name="user_id" value="1"> <!-- Usuario predeterminado -->
            <button type="submit">Reservar Espacio</button>
        </form>
    @else
        <p>Este espacio ya está reservado.</p>
    @endif
@endsection
