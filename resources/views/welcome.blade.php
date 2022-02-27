@extends('plantilla.madre')
@section('titulo')
Bienvenido
@stop
@section('contenido')
@if(session('denegar'))
<div class="alert alert-danger">
    {{session('denegar')}}
</div>
@endif
@stop