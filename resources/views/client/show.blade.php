@extends('layouts.landing')


@section('title','Mostrar')

@section('content')
<a href="{{route("client.index")}}">Regresar</a>
<div>
    <label for="name">Nombre: {{$clients->name}}</label>
</div>

<div>
    <label for="lastname">Email: {{$clients->email}}</label>
</div>
@endsection