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
<a type="buttom" href="{{route('candidato.create')}}" class="btn btn-primary">Nuevo Candidato</a>
@endcan

<table  id="datatable" class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="text-align: center">Nombre</th>
        <th scope="col" style="text-align: center">Identidad</th>
        <th scope="col" style="text-align: center">Cargo Politico</th>
        <th scope="col" style="text-align: center">Planilla</th>
        <th scope="col" style="text-align: center">Detalles</th>
        <th scope="col" style="text-align: center">Editar</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($candidatos as $candidato)
        <tr>
            <td>{{$candidato->name}}</td>
            <td>{{$candidato->identidad}}</td>
            <td>{{$candidato->cargos->descripcion}}</td>
            <td>{{$candidato->planillas->name}}</td>
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