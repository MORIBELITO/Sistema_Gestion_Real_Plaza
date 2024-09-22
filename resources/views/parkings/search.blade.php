<!-- resources/views/parkings/search.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Buscar Espacios de Parqueo por Zona</h1>

    <form action="{{ route('parkings.search') }}" method="GET">
        <label for="zone">Zona</label>
        <input type="text" id="zone" name="zone" placeholder="Introduce la zona" required>
        <button type="submit">Buscar</button>
    </form>

    @if(isset($parkings))
        <h2>Resultados para la zona: {{ $zone }}</h2>
        @if($parkings->isEmpty())
            <p>No se encontraron espacios de parqueo en la zona "{{ $zone }}".</p>
        @else
            <ul>
                @foreach($parkings as $parking)
                    <li>Zona: {{ $parking->zone }} - Disponible: {{ $parking->available ? 'Sí' : 'No' }}</li>
                @endforeach
            </ul>
        @endif
    @endif
@endsection
