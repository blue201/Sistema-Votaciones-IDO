@extends('plantilla.madre')
@section('titulo')
Detalles del empleado
@stop
@section('contenido')

<br><br>
    <div style="width: 30%;float: left;margin-left: 3%">
        <label style="width: 20%; float: left;line-height: 35px;" for="">Nombre: </label>
        <input style="width: 80%; float: left;" class="form-control" value="{{$estudiante->user->name}}" disabled>
    </div>

    <div style="width: 30%;float: left;margin-left: 3%">
        <label style="width: 20%; float: left;line-height: 35px;" for="">Identidad: </label>
        <input style="width: 80%; float: left;" class="form-control" value="{{$estudiante->user->identidad}}" disabled>
    </div>

    <div style="width: 30%;float: left;margin-left: 3%">
        <label style="width: 20%; float: left;line-height: 35px;" for="">Modalidad: </label>
        <input style="width: 80%; float: left;" class="form-control" value="{{$estudiante->modalidad->descripcion}}" disabled>
    </div>
<br><br><br><br>
    <div style="width: 30%;float: left;margin-left: 3%">
        <label style="width: 20%; float: left;line-height: 35px;" for="">Curso: </label>
        <input style="width: 80%; float: left;" class="form-control" value="{{$estudiante->curso->descripcion}}" disabled>
    </div>

    <div style="width: 30%;float: left;margin-left: 3%">
        <label style="width: 20%; float: left;line-height: 35px;" for="">Grupos: </label>
        <input style="width: 80%; float: left;" class="form-control" value="{{$estudiante->grupo->descripcion}}" disabled>
    </div>

    <div style="width: 30%;float: left;margin-left: 3%">
        <label style="width: 20%; float: left;line-height: 35px;" for="">Jornadas: </label>
        <input style="width: 80%; float: left;" class="form-control" value="{{$estudiante->jornada->descripcion}}" disabled>
    </div>
<br><br><br><br>
    <a class="btn btn-danger" type="button" href="{{route('estudiante.index')}}">Regresar</a>
@stop
