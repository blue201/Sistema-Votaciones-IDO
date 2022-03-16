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
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								 </div>
								 <div class="x_content">
									<br />
									<form action="{{ route('candidato.store') }}" method="POST" id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left">
									   @csrf
									<!-- IMAGEN
									<div class='col-sm-0 left'>
										<div class=" form-group ">
										<h7>Subir Imagenes</h7>
											<div class='input-group ' >
											   <img class="rounded mx-auto d-block" src="images/img.jpg" alt="..." />
											</div>
											<br>
											
											</br>
											
										</div>
										
										<form action="">
											<input type="file" name="file" id>
										</form>
									</div>
									-->
									<!--FIN-->


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
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Usuario </label>
											<div class="col-md-6 col-sm-6 ">
												<input name="user" type="text" required maxlength="20" class="form-control @error('usuario') is-invalid @enderror" placeholder="Nombre de Usuario" value="{{old('user')}}">
												@error('user')
													<span class="invalid-feedback" role="alert">
														<i style="color: red">{{ $message }}</i>
													</span>
												@enderror
											</div>
										</div>

											

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Contraseña</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password">
											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror	
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="confirmar-contra">Confirmar Contraseña </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="password" type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror">
											</div>
										</div>
										
								
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Puesto</label>
											<div  class="col-md-6 col-sm-6 " >
												<select name="puesto" id="puesto" class="form-control @error('puesto') is-invalid @enderror">
													@foreach ($cargo_politicos as $c)
														@if ($c->id >0)
														<option value="{{$c->nombre}}">{{$c->nombre}}</option>
														@endif
													@endforeach
												</select>
												
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Cargo Institucional: </label>
											<div  class="col-md-6 col-sm-6 " >
												<select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
													@foreach ($roles as $r)
														@if ($r->id >1)
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