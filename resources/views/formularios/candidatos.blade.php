@extends('plantilla.madre')
@section('titulo')
Candidatos a Elecciones
@stop
@section('contenido')

        <!-- page content -->

            <div class="">
              <div class="clearfix"></div>
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
                              <h4 class="brief"><i>{{$candidato->name}}</i></h4>
                              <div class="left col-sm-7">
                                <h2></h2>
                                
                                <ul class="list-unstyled">
                                  <li><strong>Cargo Politico:</strong></li>
                                  <li>{{$candidato->cargoPoli}}</li>
                                  <li><i class="fa fa-building"></i> Planilla: </li>
                                  <li>{{$candidato->planilla}}</li>
                                  <li><i class="fa fa-phone"></i> Identidad #: </li>
                                  <li> {{$candidato->identidad}} </li>
                                </ul>
                              </div>
                              <div class="right col-sm-5 text-center">
                                <img src="{{asset('images/imgcandidato/1647811737-imagen.jfif')}}" alt="" class="img-circle img-fluid">
                              </div>
                            </div>
                            <div class=" bottom text-center">
                              <div class=" col-sm-6 emphasis">
                                
                              </div>
                              <div class=" col-sm-2 emphasis">
                                <!--<button type="button" class="btn btn-success btn-sm"> Propuesta </button>
                                  -->
                                  @can('planilla.index')
                                  <a class="btn btn-primary btn-sm" href="{{route('planilla.index')}}">Planilla</a>
                                  @endcan
                              </div>
                            </div>
                          </div>
                        </div>
  
                      @endforeach

                    </div>
                  </div>
              </div>
            </div>
          <!-- /page content -->

@stop