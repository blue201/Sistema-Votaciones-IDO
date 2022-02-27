@extends('plantilla.madre')
@section('titulo')
Crear Profesor
@stop
@section('contenido')

<form method="post">
    @csrf
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Nombre Completo: </label>
        <div  class="col-md-6 col-sm-6 " >
            <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" required max="40" 
            placeholder="Nombre Completo" value="{{old('name')}}">
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
            placeholder="Nombre de Usuario" value="{{old('user')}}">
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
            placeholder="Identidad sin guiones" value="{{old('identidad')}}">
            @error('identidad')
                <span class="invalid-feedback" role="alert">
                  <i style="color: red">{{ $message }}</i>
                </span>
            @enderror
        </div>
    </div>
    <br>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Contraseña: </label>
        <div  class="col-md-6 col-sm-6 " >
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
            name="password" placeholder="Contraseña">
            @error('password')
                <span class="invalid-feedback" role="alert">
                  <i style="color: red">{{ $message }}</i>
                </span>
            @enderror
        </div>
    </div>
    <br>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Confirmar Contraseña: </label>
        <div  class="col-md-6 col-sm-6 ">
            <input class="form-control"  type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
        </div>
    </div>
    <br>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" >Cargo Institucional: </label>
        <div  class="col-md-6 col-sm-6 " >
            <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
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