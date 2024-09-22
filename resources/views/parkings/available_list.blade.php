<!-- resources/views/parkings/available_list.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Espacios de Parqueo Disponibles</h1>

    <ul>
        @forelse($availableParkings as $parking)
            <li>Zona: {{ $parking->zone }} - Disponible</li>
        @empty
            <li>No hay espacios de parqueo disponibles.</li>
        @endforelse
    </ul>
@endsection
