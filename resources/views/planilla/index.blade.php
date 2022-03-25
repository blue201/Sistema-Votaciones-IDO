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
        <th scope="col" style="text-align: center">Documento</th>
        <th scope="col" style="text-align: center">Ver</th>
        <th scope="col" style="text-align: center">Editar</th>
        <th scope="col" style="text-align: center">Eliminar</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($planillas as $planilla)
        <tr>
            <td>{{$planilla->name}}</td>
            <td>{{$planilla->lema}}</td>
            <td>{{$planilla->created_at}}</td>
            <td>
            <a href="archivo/{{$planilla->propuesta}}" target="blank_" class="btn btn-danger">VerDoc</button>
            </td>
           <!-- <td>
            <button type="button" class="btn btn-danger">Ver</button>
            </td>-->
            <td>
            <button type="button" class="btn btn-danger">Editar</button>
            </td>
            <td>
            <button type="button" class="btn btn-warning">Eliminar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop