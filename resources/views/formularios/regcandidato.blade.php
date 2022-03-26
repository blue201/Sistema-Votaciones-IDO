@extends('plantilla.madre')
@section('titulo')
Registro de Nuevos Candidatos
@stop
@section('contenido')

<!-- page content -->
				<div class="">
					<div class="clearfix"></div>
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
									<form action="{{ route('candidato.store') }}" method="POST" enctype="multipart/form-data"  id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left">
									   @csrf

									   <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Agregar Foto</label>
											<div class="col-md-6 col-sm-6 ">
												
													<input type="file" name="foto" placeholder="Agregar Foto" id="" accept="image/*">
														
													
												
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Nombre Completo</label>
											<div class="col-md-6 col-sm-6 ">
												<input name="name" type="text"  required maxlength="40" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre Completo" value="{{old('name')}}">
												@error('name')
													<span class="invalid-feedback" role="alert">
														<i style="color: red">{{ $message }}</i>
													</span>
												@enderror
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">No. Identidad </label>
											<div class="col-md-6 col-sm-6 ">
											  <input name="identidad" type="text" required maxlength="13" pattern="[0-9]{13}" title="Ingrese una identidad valida" 
            											placeholder="Identidad sin guiones" value="{{old('identidad')}}" class="form-control @error('identidad') is-invalid @enderror">
												
														@error('identidad')
															<span class="invalid-feedback" role="alert">
															<i style="color: red">{{ $message }}</i>
															</span>
														@enderror
									          									        
											</div>
										  </div>
										

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Cargo Politico </label>
											<div  class="col-md-6 col-sm-6 " >
												<select name="cargoPoli" id="puesto" class="form-control @error('cargoPoli') is-invalid @enderror">
													@foreach ($cargo_politicos as $c)
														@if ($c->id >0)
														<option value="{{$c->id}}">{{$c->nombre}}</option>
														@endif
													@endforeach
												</select>
												
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Seleccione la Plannilla </label>
											<div  class="col-md-6 col-sm-6 " >
												<select name="planilla" id="planilla" class="form-control @error('planilla') is-invalid @enderror">
													@foreach ($planillas as $r)
														@if ($r->id >0)
														<option value="{{$r->id}}">{{$r->name}}</option>
														@endif
													@endforeach
												</select>
												
											</div>
    									</div>	
										
										
								
									





										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-4">
												<button class="btn btn-primary" href="{{route('candidato.index')}}" type="button">Cancelar</button>
												<button class="btn btn-primary" type="reset">Limpiar</button>
												<button type="submit"  class="btn btn-success">Registrar</button>
												
											</div>
										</div>
									</form>
								</div>

											







								

						



							
							</div>
						</div>

				



					</div>
				</div>
			</div>
       
 <!-- /page content -->
       
@stop