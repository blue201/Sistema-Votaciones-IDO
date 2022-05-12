@extends('plantilla.madre2')
@section('titulo')
Listado de Candidatos
@stop
@section('contenido')

<!-- page content -->
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								    <div class="x_title">
										<h2>Listado <small>Diferentes Elementos</small></h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
										</ul>
									 <div class="clearfix"></div>
								    </div>
								<div class="x_content left">
									<br />
                                    @foreach ($candidatos as $c) 
                                        
										<div style="float: left; border-top-style: solid;
										border-right-style: solid;
										border-bottom-style: solid;
										border-left-style: solid; width: 28%;margin-left: 2.5%;margin-right: 2.5%;margin-bottom: 5%;">

											<div class="col-8" >
												<br>
													<div id="preview[{{$c->id}}]" style="width: 300px; height: 200px;">
													<center><img src="{{asset($c->foto)}}" style="width: 190px; height: 173px;"></center>
													</div>
											</div>
											<input style="text-align: center" type="text" class="form-control" disabled value="{{$c->cargopolitico->nombre}}">
											<input style="text-align: center" name="nombre{{$c->id}}"  type="text"  class="form-control" value="{{$c->name}}" disabled>
											<input style="text-align: center" name="id{{$c->id}}" type="text" class="form-control" value="{{$c->identidad}}" disabled>
										</div>
									@endforeach
						

								</div>

											
								<div class="ln_solid" style="float: left"></div>
								<div class="item form-group" style="float: left">
									<div class="">
										<a class="btn btn-primary" href="{{route('planilla.create')}}" type="button">Regresar</a>
										
									</div>
								</div>
							
							</div>
						</div>

					</div>
				</div>
			</div>
       
 <!-- /page content -->
       
@stop