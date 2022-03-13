@extends('plantilla.madre')
@section('titulo')
Candidatos Registrados
@stop
@section('contenido')

<style>
    #prueba {
        overflow:auto;
    }
  </style>

@can('candidato.create')
<a type="buttom" href="{{route('candidato.create')}}" class="btn btn-primary">Nuevo Profesor</a>
@endcan

<table  id="datatable" class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="text-align: center">Nombre</th>
        <th scope="col" style="text-align: center">Identidad</th>
        <th scope="col" style="text-align: center">Usuario</th>
        <th scope="col" style="text-align: center">Fecha de Registro</th>
        <th scope="col" style="text-align: center">Detalles</th>
        <th scope="col" style="text-align: center">Editar</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($candidatos as $candidato)
        <tr>
            <td>{{$candidato->name}}</td>
            <td>{{$candidato->identidad}}</td>
            <td>{{$candidato->user}}</td>
            <td>{{$candidato->created_at}}</td>
            <td>
            <button type="button" class="btn btn-success">Ver</button>
            </td>
            <td>
            <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop