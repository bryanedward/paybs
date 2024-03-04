@extends('layouts.landing')


@section('title','index')

@section('content')

    <h1>Clientes</h1>
    <a href="{{route("client.create")}}">Crear un nuevo client</a>
@endsection