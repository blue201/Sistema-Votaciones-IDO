@extends('plantilla.madre')
@section('titulo')
Candidatos a Elecciones
@stop
@section('contenido')

        <!-- page content -->

            
                <div class="row">
                  <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12  text-center">
                          <ul class="pagination pagination-split">
                           
                          </ul>
                        </div>
  
                        <div class="clearfix"></div>
  


                        @foreach ($candidatos as $candidato)
      
                        <div class="col-md-4 col-sm-4  profile_details">
                          <div class="well profile_view">
                            <div class="col-sm-12">
                              <h4 class="brief"><i>{{$candidato->cargopolitico->nombre}}</i></h4>
                              <div class="left col-sm-7">
                                <h2></h2>
                                
                                <ul class="list-unstyled">
                                  <li><strong>Nombre del Candidato:</strong></li>
                                  <li>{{$candidato->name}}</li>
                                  <li><i class="fa fa-building"></i> Planilla: </li>
                                  <li>{{$candidato->planilla->name}}</li>
                                  <li><i class="fa fa-phone"></i> Identidad #: </li>
                                  <li> {{$candidato->identidad}} </li>
                                </ul>
                              </div>
                              <div class="right col-sm-5 text-center">
                                <img src="{{asset($candidato->foto)}}" alt="" class="img-circle img-fluid">
                              </div>
                            </div>
                            <div class=" bottom text-center">
                              <div class=" col-sm-6 emphasis">
                                
                              </div>
                              <div class=" col-sm-2 emphasis">
                                
                                  @can('planilla.mostrar')
                                  <a class="btn btn-primary btn-sm" href="{{route('planilla.mostrar', ['id'=>$candidato->id])}}">Planilla</a>
                                  @endcan
                              </div>
                            </div>
                          </div>
                        </div>
  
                      @endforeach

                    </div>
                  </div>
          <!-- /page content -->

@stop