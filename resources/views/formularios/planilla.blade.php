@extends('plantilla.madre')
@section('titulo')
Planilla de Elecciones Estudiantiles
@stop
@section('contenido')

        <!-- page content -->

            <div class="">
  
              <div class="clearfix"></div>
  
              <div class="row">
                <div class="col-md-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Elecciones Estudiantiles  <small> IDO </small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
  
  
                      
  
                      <div class="col">
                            <div class="x_panel">
                              <img class="rounded mx-auto d-block" src="{{asset('images/imgs.jpg')}}" alt="image" />
                            </div>
                      </div>
                    </div>
  
  
                    <div class="col-md-15">
                      <div class="x_panel">
                      </div>
                    </div>
                      
  
                    <div class="col">
                      <div class="x_panel">
                        <div class="right">
                          <img class="float-right" src="{{asset('images/imgs.jpg')}}" alt="image" />
                        </div>
  
                        <div class="left">
                            <img class="rounded float-left" src="{{asset('images/imgs.jpg')}}" alt="image" />
                        </div>
  
                        <div class="text-center">
                          <img class="rounded" src="{{asset('images/imgs.jpg')}}" alt="image" />
                        </div>
  
                    </div>
  
  
                    <div class="col-md-15">
                      <div class="x_panel">
                      </div>
                    </div>
                      
                      
                      <div class="col-md-15">
                        
                        <div class="x_panel">
                          <div class="right">
                            <img class="float-right" src="{{asset('images/imgs.jpg')}}" alt="12" />
                          </div>
  
                          <div class="left">
                              <img class="rounded float-left" src="{{asset('images/imgs.jpg')}}" alt="image" />
                          </div>
  
                          <div class="text-center">
                            <img class="rounded" src="{{asset('images/imgs.jpg')}}" alt="image" />
                          </div>
  
                      </div>
  
  
                      
                      <div class="col-md-15">
                            <div class="x_panel">
                            </div>
                      </div>
  
                      
  
  
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <!-- /page content -->

@stop