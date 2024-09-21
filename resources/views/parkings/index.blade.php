<!-- resources/views/parkings/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Espacios de Parqueo</h1>

    <ul>
        @foreach($parkings as $parking)
            <li>
                Zona: {{ $parking['zone'] }} | Disponible: {{ $parking['available'] ? 'Sí' : 'No' }}
                <a href="{{ route('parkings.show', $parking['id']) }}">Ver Detalles</a>
            </li>
        @endforeach
    </ul>
@endsection
