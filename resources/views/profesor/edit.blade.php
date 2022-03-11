@extends('plantilla.madre')
@section('titulo')
Crear Profesor
@stop
@section('contenido')

<form action="{{route("profesor.edit",["id"=>$profesor->id])}}"  method="post">
    @method("PUT")
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Nombre Completo: </label>
        <div  class="col-md-6 col-sm-6 " >
            <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" required max="40" 
            placeholder="Nombre Completo" value="@if(old('name')){{old('name')}}@else{{$profesor->user->name}}@endif">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <i style="color: red">{{ $message }}</i>
                </span>
            @enderror
        </div>
    </div>
    <br>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Nombre de Usuario: </label>
        <div  class="col-md-6 col-sm-6 " >
            <input  type="text" class="form-control @error('user') is-invalid @enderror" name="user" required max="20" 
            placeholder="Nombre de Usuario" value="@if(old('user')){{old('user')}}@else{{$profesor->user->user}}@endif">
            @error('user')
                <span class="invalid-feedback" role="alert">
                    <i style="color: red">{{ $message }}</i>
                </span>
            @enderror
        </div>
    </div>
    <br>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Identidad: </label>
        <div  class="col-md-6 col-sm-6 " >
            <input  type="text" class="form-control @error('identidad') is-invalid @enderror" 
            name="identidad" required maxlength="13" pattern="[0-9]{13}" title="Ingrese una identidad valida" 
            placeholder="Identidad sin guiones" value="@if(old('identidad')){{old('identidad')}}@else{{$profesor->user->identidad}}@endif">
            @error('identidad')
                <span class="invalid-feedback" role="alert">
                  <i style="color: red">{{ $message }}</i>
                </span>
            @enderror
        </div>
    </div>
    <br>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Cargo: </label>
        <div  class="col-md-6 col-sm-6 " >
            <select name="cargo" id="cargo" class="form-control @error('cargo') is-invalid @enderror">
                <option style="display: none" value="{{$profesor->cargo->id}}">{{$profesor->cargo->descripcion}}</option>
                @foreach ($cargos as $r)
                    <option value="{{$r->id}}">{{$r->descripcion}}</option>
                @endforeach
            </select>
            @error('cargo')
                <span class="invalid-feedback" role="alert">
                  <i style="color: red">{{ $message }}</i>
                </span>
            @enderror
        </div>
    </div>
    <br>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Funcion: </label>
        <div  class="col-md-6 col-sm-6 " >
            <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
                <option style="display: none" value="{{$profesor->funcion}}">{{$profesor->funcion}}</option>
                @foreach ($roles as $r)
                    @if ($r->id >2)
                    <option value="{{$r->name}}">{{$r->name}}</option>
                    @endif
                @endforeach
            </select>
            @error('password')
                <span class="invalid-feedback" role="alert">
                  <i style="color: red">{{ $message }}</i>
                </span>
            @enderror
        </div>
    </div>
    
<br>
<div class="ln_solid"></div>
<div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-4">
        <a class="btn btn-danger" href="{{route('profesor.index')}}" type="button">Cancelar</a>
        <button class="btn btn-primary" type="reset">Limpiar</button>
        <button  type="submit" class="btn btn-success">Registrarse</button>
    </div>
</div>

  </form>

@stop