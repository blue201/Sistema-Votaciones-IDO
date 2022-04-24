@extends('plantilla.madre')
@section('titulo')
Editar Candidatos de Planilla
@stop
@section('contenido')

<!-- page content -->
<style>
	#custom-button {
  padding: 2px;
  color: white;
  background-color:#181d57;
  border: 1px solid #000;
  border-radius: 1px;
  cursor: pointer;
}

#custom-button:hover {
  background-color: #181d57;
}

#custom-text {
  margin-left: 1px;
  font-family: sans-serif;
  
  color: #aaa;
}
</style>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								    <div class="x_title">
										<h2>Formulario de Registro <small>Diferentes Elementos</small></h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
										</ul>
									 <div class="clearfix"></div>
								    </div>
								<div class="x_content left">
									<br />

									@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								
									<form action="{{route('candidato.update',['id'=>$planilla->id])}}"  method="post" enctype="multipart/form-data"  id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left">
									@method("PUT")   
									@csrf 
									
										<Select required name="planilla" class="form-control">
											<option style="display: none" value="@if(old('planilla')){{old('planilla')}}@else{{$planilla->id}}@endif" >{{$planilla->name}}</option>
											@foreach ($planillas as $p)
												<option value="{{$p->id}}">{{$p->name}}</option>
											@endforeach
										</Select>
										<br><br>
										@foreach ($candidatos as $c)
										
										<div style="float: left; border-top-style: solid;
										border-right-style: solid;
										border-bottom-style: solid;
										border-left-style: solid; width: 28%;margin-left: 2.5%;margin-right: 2.5%;margin-bottom: 5%;">
											
											<div class="col-8" >
											<input type="file" name="seleccionArchivos{{$c->id}}" id="real-file" hidden="hidden" />
											</br>
											<button type="button" id="custom-button">Imagen</button>
											<span style="font-size:8px;" id="custom-text">{{$c->foto}}</span>

											<!--<input required type="file"  id="seleccionArchivos[{{$c->id}}]" name="seleccionArchivos{{$c->id}}" accept="image/*" name="imagen[{{$c->id}}]" style="font-size: 9px"
												value="@if(old('imagen'.$c->id_cargo)){{old('imagen'.$c->id_cargo)}}@else{{$c->foto}}@endif"></input>
												 value="{{old('seleccionArchivos'.$c->id)}}" La imagen que vamos a usar para previsualizar lo que el usuario selecciona -->
												<br>
													<div id="preview[{{$c->id}}]" style="width: 300px; height: 200px;">
													<img src="{{asset($c->foto)}}" style="width: 190px; height: 173px;">
													</div>
											</div>
											<input style="text-align: center" type="text" class="form-control" disabled value="{{$c->cargopolitico->nombre}}">
											<!--<input style="text-align: center" name="nombre" value="{{old('nombre'.$c->id)}}" type="text" required maxlength="60" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre Completo"
											value="@if(old('nombre')){{old('nombre')}}@else{{$c->name}}@endif">{{$c->name}}</input>-->
											<input style="text-align: center" name="name{{$c->id_cargo}}" type="text" required maxlength="40" class="form-control" placeholder="Nombre de Planilla" 
												value="@if(old('name'.$c->id_cargo)){{old('name'.$c->id_cargo)}}@else{{$c->name}}@endif"></input>
											<!--<input style="text-align: center" name="id{{$c->id}}" value="{{old('name'.$c->name)}}"  type="text" required maxlength="13" pattern="[0-9]{13}" class="form-control" placeholder="Identidad">
												--><input style="text-align: center" name="id{{$c->id_cargo}}" type="text" required maxlength="40" class="form-control" required maxlength="13" pattern="[0-9]{13}" placeholder=" Identidad " 
												value="@if(old('id'.$c->id_cargo)){{old('id'.$c->id_cargo)}}@else{{$c->identidad}}@endif"></input>
										</div>
										<script type="text/javascript">
											const realFileBtn = document.getElementById("real-file");
											const customBtn = document.getElementById("custom-button");
											const customTxt = document.getElementById("custom-text");

											customBtn.addEventListener("click", function() {
											realFileBtn.click();
											});

											realFileBtn.addEventListener("change", function() {
											if (realFileBtn.value) {
												customTxt.innerHTML = realFileBtn.value.match(
												/[\/\\]([\w\d\s\.\-\(\)]+)$/
												)[1];
											} else {
												customTxt.innerHTML = "No file chosen, yet.";
											}
											});

										</script>
										<script>
											document.getElementById("seleccionArchivos[{{$c->id}}]").onchange = function(e) {
											// Creamos el objeto de la clase FileReader
											let reader = new FileReader();

											// Leemos el archivo subido y se lo pasamos a nuestro fileReader
											reader.readAsDataURL(e.target.files[0]);

											// Le decimos que cuando este listo ejecute el código interno
											reader.onload = function(){
												let preview = document.getElementById('preview[{{$c->id}}]'),
														image = document.createElement('img');
														
												image.src = reader.result;
												image.style.width = "190px";
												image.style.height = "173px";
												
												preview.innerHTML = '';
												preview.append(image);
											};
											}
										</script>
									@endforeach
						

									
								</div>

											
								<div class="ln_solid" style="float: left"></div>
								<div class="item form-group" style="float: left">
									<div class="">
										<button class="btn btn-primary" href="{{route('candidato.index')}}" type="button">Cancelar</button>
										<button class="btn btn-primary" type="reset">Limpiar</button>
										<button type="submit"  class="btn btn-success">Actualizar</button>
										
									</div>
								</div>

							</form>
							
							</div>
						</div>

					</div>
       
 <!-- /page content -->
       
@stop