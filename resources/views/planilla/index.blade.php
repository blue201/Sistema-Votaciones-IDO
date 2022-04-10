@extends('plantilla.madre')
@section('titulo')
Planillas Registrados
@stop
@section('contenido')

<style>
    #prueba {
        overflow:auto;
    }
  </style>

@can('planillaa.create')
<a type="buttom" href="{{route('planillaa.create')}}" class="btn btn-primary">Nuevo Planilla</a>
@endcan

<table  id="datatable" class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="text-align: center">Nombre</th>
        <th scope="col" style="text-align: center">Lema</th>
        <th scope="col" style="text-align: center">Fec. Registro</th>
        <th scope="col" style="text-align: center">Propuesta</th>
        <th scope="col" style="text-align: center">Candidatos</th>
        <th scope="col" style="text-align: center">Editar</th>
        <th scope="col" style="text-align: center">Eliminar</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($planillas as $planilla)
        <tr>
            <td>{{$planilla->name}}</td>
            <td>{{$planilla->modalidads->descripcion}}</td>
            <td>{{$planilla->created_at}}</td>
            <td>
            <a href="archivo/{{$planilla->propuesta}}" target="blank_" class="btn btn-danger">VerDoc</button>
            </td>
           <td>
            <a type="button" href="{{Route('planilla.show',['id'=>$planilla->id])}}" class="btn btn-success">Candidatos</a>
            </td>
           
            <td>
            <center>
                <a class="btn btn-warning" href="{{route('planilla.edit',['id'=>$planilla->id])}}">
                    <i class="fa fa-edit"></i>
                </a>
            </center>
            </td>
            <td>
            <center>
                <form action="{{route('planilla.destroy',['id'=>$planilla->id])}}" method="post">
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