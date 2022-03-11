@extends('plantilla.madre')
@section('titulo')
Cargos
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

<a href='#' data-toggle="modal" data-target="#createCargo" class="btn btn-info">
    <i class="fas fa-plus-circle"></i> <strong >Nuevo Cargo</strong>
</a>

<!--Modal de creacion de cargo-->
<div class="modal fade" id="createCargo" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-image: linear-gradient(to left,  #4d55c4,#0b15a7);color:white;">
                <h5 class="modal-title" id="exampleModalLabel">
                    Agregar Cargo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="btn-border btn-outline-danger btn-lg">X</span>
                </button>
            </div>

            <form method="post" action="">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label style="float: left;width: 20%" for="delito" class="col-form-label">Cargo:</label>
                        <input style="float: left;width: 80%" required type="text" class="form-control form-control-user" maxlength="150" name="descripcion"
                            id="descripcion" placeholder="Ingrese el nombre del cargo" onkeyup="validar()">
                            <label for="" id="mensaje1" style="color: red"></label>
                    </div>

                    <script>
                        function validar(){
                            var boton = document.getElementById('save');
                            boton.disabled = true;
                            var descripcion = document.getElementById('descripcion').value;
                            if(descripcion != ''){
                                boton.disabled = false;
                                document.getElementById('mensaje1').innerHTML= '';    
                            }else{
                                document.getElementById('mensaje1').innerHTML= 'Esta campo no puede ser vacio';    
                            }
                                                    
                        }
                    </script>

                </div>
                <div class="modal-footer">
                    <!--Boton Guardar-->
                    <button type="submit" class="btn btn-primary" id="save" data-toggle="modal" data-target="#createCargo" disabled>
                        Guardar
                    </button>

                    <button type="reset" class="btn btn-success">
                        Limpiar
                    </button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>

        </div>
    </div>
</div>
<!--Final del modal añadir-->

<table id="datatable" class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="text-align: center">#</th>
        <th scope="col" style="text-align: center">Descripcion</th>
        <th scope="col" style="text-align: center;width: 200px">Accion</th>
    </tr>
    </thead>

    <tbody>
        <?php $i = 1;?>
    @foreach ($cargos as $cargo)
        <tr>
            <td>{{$i}}</td>
            <td>{{$cargo->descripcion}}</td>
            <td>
                    <center>
                        <a type="button" class="btn btn-success" href="">Editar</a>
                        <a type="button" class="btn btn-danger" href="">Eliminar</a>
                    </center>
            </td>
        </tr>
        <?php $i += 1;?>
    @endforeach
    </tbody>
</table>

@stop