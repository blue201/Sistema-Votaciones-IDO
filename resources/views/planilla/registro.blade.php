@extends('plantilla.madre')
@section('titulo')
Registro de Nueva Planilla
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
									<form action="{{ route('planilla.store') }}" method="POST" enctype="multipart/form-data" id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left">
									   @csrf

									   <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Nombre de Planilla</label>
											<div class="col-md-6 col-sm-6 ">
											    <input name="name" type="text" required maxlength="40" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre de Planilla" value="{{old('name')}}"></input>
												
												@error('name')
													<span class="invalid-feedback" role="alert">
														<i style="color: red">{{ $message }}</i>
													</span>
												@enderror
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Agregar Logo</label>
											<div class="col-md-6 col-sm-6 ">
												
													<input type="file" name="foto" placeholder="Agregar Foto" id="" accept="image/*">
														
													
												
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Lema </label>
											<div class="col-md-6 col-sm-6 ">
											    <textarea name="lema" type="text" required maxlength="100" class="form-control @error('lema') is-invalid @enderror" placeholder="Escriba su Lema" value="{{old('lema')}}"></textarea>
												
												@error('lema')
													<span class="invalid-feedback" role="alert">
														<i style="color: red">{{ $message }}</i>
													</span>
												@enderror
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" >Agregar Propuesta</label>
											<div class="col-md-6 col-sm-6 ">
												
													<input type="file" name="propuesta" placeholder="Agregar propuesta" id="" accept="file/*">
														
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Modalidad </label>
											<div  class="col-md-6 col-sm-6 " >
												<select name="modalidad" id="modalidad" class="form-control @error('modalidad') is-invalid @enderror">
													@foreach ($modalidads as $c)
														@if ($c->id >0)
														<option value="{{$c->descripcion}}">{{$c->descripcion}}</option>
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