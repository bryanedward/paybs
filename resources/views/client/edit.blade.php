@extends('layouts.landing')


@section('title','index')

@section('content')
<a href="{{route("client.index")}}">Regresar</a>
<form method="POST" action="{{route("client.update",  $client->id )}}">
    @method("put")
    @csrf

    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{$client->name}}">
    </div>

    <div>
        <label for="lastname">Email:</label>
        <input type="text" id="lastname" name="lastname" value="{{$client->email}}">
    </div>


    <button type="submit">actualizar Cliente</button>
</form>

@endsection