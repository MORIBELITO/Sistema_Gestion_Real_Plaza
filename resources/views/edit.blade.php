<!-- resources/views/parkings/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Espacio de Parqueo</h1>

    <form action="{{ route('parkings.update', $parking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="zone">Zona</label>
        <input type="text" id="zone" name="zone" value="{{ old('zone', $parking->zone) }}" required>

        <label for="available">Disponible</label>
        <select id="available" name="available" required>
            <option value="1" {{ $parking->available ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ !$parking->available ? 'selected' : '' }}>No</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>
@endsection
