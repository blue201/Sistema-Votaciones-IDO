@extends('plantilla.madre')
@section('titulo')
Profesores Registrados
@stop
@section('contenido')

<style>
    #prueba {
        overflow:auto;
    }
  </style>

@can('profesor.create')
<a type="buttom" href="{{route('profesor.nuevo')}}" class="btn btn-primary">Nuevo Profesor</a>
@endcan

<table  id="datatable" class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="text-align: center">Identidad</th>
        <th scope="col" style="text-align: center">Nombre</th>
        <th scope="col" style="text-align: center">Usuario</th>
        <th scope="col" style="text-align: center">Fecha de Registro</th>
        <th scope="col" style="text-align: center">Detalles</th>
        <th scope="col" style="text-align: center">Editar</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($profesors as $profesor)
        <tr>
            <td>{{$profesor->identidad}}</td>
            <td>{{$profesor->name}}</td>
            <td>{{$profesor->user}}</td>
            <td>{{$profesor->created_at}}</td>
            <td>
                @can('profesor.show')
                    
                @endcan
            </td>
            <td>
                @can('profesor.edit')
                    
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop