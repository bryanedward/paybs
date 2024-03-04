@extends('layouts.landing')


@section('title','index')

@section('content')
    <h1>pagina de index del banco</h1>
    @component('_components.card')
        @slot('title','ok')
    @endcomponent
@endsection