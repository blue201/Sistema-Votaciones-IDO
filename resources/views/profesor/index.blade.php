@extends('plantilla.madre')
@section('titulo')
Profesores Registrados
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

@can('profesor.create')
<a type="buttom" href="{{route('profesor.nuevo')}}" class="btn btn-primary">Nuevo Profesor</a>
@endcan

<table  id="datatable-buttons" class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="text-align: center">Fecha</th>
        <th scope="col" style="text-align: center">Identidad</th>
        <th scope="col" style="text-align: center">Nombre</th>
        <th scope="col" style="text-align: center">Usuario</th>
        <th scope="col" style="text-align: center">Cargo</th>
        <th scope="col" style="text-align: center">Funcion</th>
        <th scope="col" style="text-align: center">Accion</th>
        <th scope="col" style="text-align: center">Eliminar</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($profesors as $profesor)
        <tr>
            <td>{{$profesor->created_at}}</td>
            <td>{{$profesor->user->identidad}}</td>
            <td>{{$profesor->user->name}}</td>
            <td>{{$profesor->user->user}}</td>
            <td>{{$profesor->cargo->descripcion}}</td>
            <td>{{$profesor->funcion}}</td>

            <td>
                @can('profesor.edit')
                    <center>
                        <a type="button" class="btn btn-danger" href="{{route('profesor.edit',['id'=>$profesor->id])}}">Editar</a>
                    </center>
                @endcan
            </td>
            <td>
            <center>
                <form action="{{route('profesor.destroy',['id'=>$profesor->id])}}" method="post">
                     @method("delete")
                     @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                </form>
            </center>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop