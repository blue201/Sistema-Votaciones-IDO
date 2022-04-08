@extends('plantilla.madre2')
@section('titulo')
Elecciones
@stop
@section('contenido')

@foreach ($planillas as $p)
    <div style="float: left; border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid; width: 20%;margin-left: 2.5%;margin-right: 2.5%;margin-bottom: 5%;">
    <input style="text-align: center;font-size: 16px;width: 60%;float: left;" type="text" class="form-control" disabled value="{{$p->name}}">
    <img src="{{asset('images/imgplanilla/'.$p->foto)}}" style="float: right" width="40%" height="70px" alt="">
    <input style="text-align: center;font-size: 14px;width: 60%;float: left;" type="text" class="form-control" disabled value="{{$p->lema}}">
    
    <img src="{{asset($p->imagen)}}" alt="" width="262px" height="200px">

    <input style="text-align: center;font-size: 14px;" type="text" class="form-control" disabled value="{{$p->nombre}}">

    <a href="">Propuesta</a>
    <a href="">Candidatos</a>
    </div>

@endforeach


@stop