@extends('plantilla.madre')
@section('titulo')
{{$titulo}}
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
        @if (isset($votacion))
        <th scope="col" style="text-align: center">Hora de votacion</th>
        <th scope="col" style="text-align: center">Voto por</th>
        @else
        <th scope="col" style="text-align: center">Accion</th>
        @endif
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
            @if (isset($votacion))
            <td>{{$estudiante->planilla}}</td>
            <td>{{$estudiante->hora_votacion}}</td>
            @else
            <td>
                @can('estudiante.show')
                    <center>
                        <a type="button" class="btn btn-info" href="{{route('estudiante.ver',['id'=>$estudiante->id])}}">Detalles</a>
                    </center>
                @endcan
            </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

@stop