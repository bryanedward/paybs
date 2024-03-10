@extends('layouts.landing')


@section('title','index')

@section('content')
    <div class="container">
        <div class="item">
            Pays
        </div>
        <div class="item">
            <h1>Lista de Pagos de los clientes</h1>
            <a href="{{route("client.create")}}">Crear un nuevo client</a>
            @forelse ($clients as $item)
            

            @component('_components.card')
            @slot('name',$item["name"])
            @slot('lastname',$item["lastname"])
            @slot('id',$item["id"])
            @endcomponent
            @empty
            <small>No dispones de datos</small>
            @endforelse
        </div>
        <div class="item">

        </div>
    </div>
   

@endsection