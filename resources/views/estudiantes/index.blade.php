@extends('plantilla.madre')
@section('titulo')
Estudiantes Registrados
@stop
@section('contenido')

<style>
    #prueba {
        overflow:auto;
    }
    .dt-buttons{
            float: right !important;
    }
  </style>

<table id="datatable-buttons" class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="text-align: center">Identidad</th>
        <th scope="col" style="text-align: center">Nombre</th>
        <th scope="col" style="text-align: center">Jornada</th>
        <th scope="col" style="text-align: center">Modalidad</th>
        <th scope="col" style="text-align: center">Curso</th>
        <th scope="col" style="text-align: center">Accion</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($estudiantes as $estudiante)
        <tr>
            <td>{{$estudiante->user->identidad}}</td>
            <td>{{$estudiante->user->name}}</td>
            <td>{{$estudiante->jornada->descripcion}}</td>
            <td>{{$estudiante->modalidad->descripcion}}</td>
            <td>{{$estudiante->curso->descripcion}}</td>
            <td>
                @can('estudiante.show')
                    <center>
                        <a type="button" class="btn btn-info" href="{{route('estudiante.ver',['id'=>$estudiante->id])}}">Detalles</a>
                    </center>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop