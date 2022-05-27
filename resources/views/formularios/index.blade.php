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
        <th scope="col" style="text-align: center">Editar</th>
        <!--th scope="col" style="text-align: center">Eliminar</th-->
    </tr>
    </thead>

    <tbody>
    @foreach ($candidatos as $candidato)
        <tr>
            <td>{{$candidato->name}}</td>
            <td>{{$candidato->identidad}}</td>
            <td>{{$candidato->cargopolitico->nombre}}</td>
            <td>{{$candidato->planilla->name}}</td>
            <td>
            <center>
                <a class="btn btn-warning" href="{{route('candidato.edit',['id'=>$candidato->id_planilla])}}">
                    <i class="fa fa-edit"></i>
                </a>
            </center>
            </td>
            <td>
            <!--center>
                <form action="{{route('candidato.destroy',['id'=>$candidato->id])}}" method="post"> 
                     @method("delete")
                     @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                </form>
            </center-->
            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop