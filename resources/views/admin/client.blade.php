@extends('layouts.landing')


@section('title','index')

@section('content')

    <h1>Clientes</h1>
    <a href="{{route("client.create")}}">Crear un nuevo client</a>

    @forelse ($clients as $item)
        @component('_components.card')
            @slot('title',$item["name"])
        @endcomponent
        @empty
        <small>No dispones de datos</small>
        @endforelse

@endsection