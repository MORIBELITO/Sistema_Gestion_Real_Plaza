<!-- resources/views/parkings/available.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Espacios de Parqueo Disponibles</h1>
    <ul>
        @forelse($availableParkings as $parking)
            <li>Zona: {{ $parking->zone }} - Disponible</li>
        @empty
            <li>No hay espacios disponibles en este momento.</li>
        @endforelse
    </ul>
@endsection
