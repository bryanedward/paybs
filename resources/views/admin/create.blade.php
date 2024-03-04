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
    </div>

    <div>
        <label for="lastname">Email:</label>
        <input type="text" id="lastname" name="lastname">
    </div>

    <!-- Otros campos del formulario -->

    <button type="submit">Crear Cliente</button>
</form>

@endsection