@extends('plantilla.madre')
@section('titulo')
Estudiantes Registrados
@stop
@section('contenido')

<style>
    #prueba {
        overflow:auto;
    }
  </style>

<table  id="datatable" class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="text-align: center">Identidad</th>
        <th scope="col" style="text-align: center">Nombre</th>
        <th scope="col" style="text-align: center">Usuario</th>
        <th scope="col" style="text-align: center">Fecha de Registro</th>
        <th scope="col" style="text-align: center">Detalles</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($estudiantes as $estudiante)
        <tr>
            <td>{{$estudiante->identidad}}</td>
            <td>{{$estudiante->name}}</td>
            <td>{{$estudiante->user}}</td>
            <td>{{$estudiante->created_at}}</td>
            <td>
                @can('estudiante.show')
                    
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop