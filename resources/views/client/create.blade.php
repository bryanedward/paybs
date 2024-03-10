@extends('layouts.landing')


@section('title','index')

@section('content')
<form method="POST" action="{{ route("store") }}">
    @method("post")
    @csrf

    <!-- Aquí van los campos del formulario -->
    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">
        <br>
        @error('name')
        <p>
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <br>
        @error('email')
        <p>
            {{ $message }}
        </p>
        @enderror
    </div>

    <!-- Otros campos del formulario -->

    <button type="submit">Crear Cliente</button>
</form>

@endsection