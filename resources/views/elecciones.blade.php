@extends('plantilla.madre2')
@section('titulo')
Elecciones
@stop
@section('contenido')

<style>

input[type=radio] {
  border: 1px solid rgb(0, 0, 0);
  background: rgb(255, 255, 255);
  padding: 0.5em;
  -webkit-appearance: none;
  width: 100%;
  height: 100%;
}

input[type=radio]:checked {
  background-size: 9px 9px;
  background: black;
  color: black;
}

input[type=radio]:focus {
  outline-color: transparent; 
}

</style>
@foreach ($candidatos as $c)
@if ($c->voto == 0)

<form method="post" action="{{ route('calculo',['id'=>$c->id] ) }}" >
    @csrf
    <div style="float: left">
@foreach ($planillas as $p)
    <div style="float: left; border-top-style: solid; border-right-style: solid;border-bottom-style: solid; 
    border-left-style: solid; width: 45%;margin-left: 2%;margin-right: 3%;margin-bottom: 5%;">
    <input style="text-align: center;font-size: 16px;width: 60%;float: left;" type="text" class="form-control" disabled value="{{$p->name}}">
    <img src="{{asset('images/imgplanilla/'.$p->foto)}}" style="float: right" width="30%" height="70%" alt="">
    <input style="text-align: center;font-size: 14px;width: 60%;float: left;" type="text" class="form-control" disabled value="{{$p->lema}}">
    <input style="text-align: center;font-size: 14px;" type="text" class="form-control" disabled value="{{$p->modalidad->descripcion}}">

    <center><img src="{{asset($p->imagen)}}" alt="" width="100%" height="100%"></center>

    <input style="text-align: center;font-size: 14px;" type="text" class="form-control" disabled value="{{$p->nombre}}">

    <a style="float: left; width: 48%" target="blank_" class="btn btn-danger" type="button" href="archivo/{{$p->propuesta}}">Propuesta</a>
    <a style="float: left; width: 48%" href="{{Route('elecciones.candidato',['id'=>$p->id])}}" class="btn btn-success" type="button">Candidatos</a>


    <div style="width: 100%; height: 100px;float: left;border-top: 1px solid rgb(0, 0, 0);
    border-right: 1px solid rgb(0, 0, 0);
    border-bottom: 1px solid rgb(0, 0, 0);
    border-left: 1px solid rgb(0, 0, 0);">
        <input type="radio" name="muhRadio" value="{{$p->id}}"/>
    </div>

    </div>

@endforeach
    </div>
    <div style="float: left; width: 100%">
<center><button type="submit" class="btn btn-info">Depositar el voto en urna</button></center>
    </div>
</form>
@else
<center>
  <div class="alert alert-success" style="font-size: 20px">
    Usted ya voto
  </div>
  <div class="">
	<a class="btn btn-primary" href="{{route('votar.index')}}" type="button">Regresar</a>								
	</div>
</center>
@endif
@endforeach

@stop