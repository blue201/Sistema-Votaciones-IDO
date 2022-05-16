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

									<!--@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif-->
									<form action="{{route('candidato.update',['id'=>$planilla->id])}}"  method="post"  enctype="multipart/form-data" id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left">
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
												<input type="file" value="{{old('seleccionArchivos'.$c->id_cargo)}}" id="seleccionArchivos[{{$c->id_cargo}}]" name="seleccionArchivos{{$c->id_cargo}}" accept="image/*" name="imagen[{{$c->id_cargo}}]" style="font-size: 9px"></INPUT>
												<!-- La imagen que vamos a usar para previsualizar lo que el usuario selecciona -->
												<br>
													<div id="preview[{{$c->id_cargo}}]" style="width: 300px; height: 200px;">
													<img src="@if(old('images/user.png')){{old('images/user.png')}}@else{{asset($c->foto)}}@endif " style="width: 190px; height: 173px;">
													
												</div>
											</div>
											<input style="text-align: center" type="text" class="form-control" disabled value="{{$c->cargopolitico->nombre}}">
											<input style="text-align: center" name="nombre{{$c->id_cargo}}" value="@if(old('nombre')){{old('nombre')}}@else{{$c->name}}@endif" type="text" required maxlength="60" class="form-control" placeholder="Nombre Completo">
											<input style="text-align: center" name="id{{$c->id_cargo}}" value="@if(old('id')){{old('id')}}@else{{$c->identidad}}@endif"  type="text" required maxlength="13" pattern="[0-9]{13}" class="form-control" placeholder="Identidad">
										</div>
										<script>
											document.getElementById("seleccionArchivos[{{$c->id_cargo}}]").onchange = function(e) {
											// Creamos el objeto de la clase FileReader
											let reader = new FileReader();

											// Leemos el archivo subido y se lo pasamos a nuestro fileReader
											reader.readAsDataURL(e.target.files[0]);

											// Le decimos que cuando este listo ejecute el código interno
											reader.onload = function(){
												let preview = document.getElementById('preview[{{$c->id_cargo}}]'),
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
										<a class="btn btn-primary" href="{{route('candidato.index')}}" type="button">Cancelar</a>
										<button class="btn btn-primary" type="reset">Limpiar</button>
										<button type="submit"  class="btn btn-success">Actualizar</button>
										
									</div>
								</div>

							</form>
							
								    <script>
											const realFileBtn = document.getElementById("seleccionArchivos[{{$c->id_cargo}}]");
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
						</div>
						</div>
					</div>
 <!-- /page content -->
@stop