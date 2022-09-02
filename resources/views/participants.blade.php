@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="card mb-5 row">
                <div class="card-header text-center"><h1> <strong>{{ __('Listado de Participantes') }}</strong></h1></div>
                <div class="card-body">
               
               
                <div class="col-12">
                <form class="form-inline d-flex justify-content-center md-form form-sm active-pink-2 mt-2 mb-3" action="{{route('participants.search')}}" method="get">
                <input class="col-4 mr-2" type="text" name="busqueda">
                <i class="fas fa-search" aria-hidden="true"></i>
                <button type="submit" class="btn btn-primary  d-inline mx-2">Buscar</button>
                <a href="/participantes" class="btn btn-success d-inline mx-1">Recargar</a>
                </form>
                
                </div>

                
                <div class="d-flex flex-wrap justify-content-center">
                @foreach($participants as $participant)
                        
                   <div class="card border-dark my-2 mx-2 col-lg-3 col-md-4 col-xs-12 col-sm-4 col-xl-3 mw-100">
                            <div class="card-header text-center text-white" style="background-color:{{$participant->color}}">
                                <strong>{{$participant->force}}</strong>  
                                <img src="{{$participant->image}}" width="50" height="50" alt="" class="d-inline">
                            </div>
                        
                        
                        <div class="card-body text-dark">   
                            <img class="img-card" src={{$participant->photo}} alt="" width="150" height="100">
                            <div>
                                <img src="{{$participant->flag_image}}" width="50" height="50" alt="" class="d-inline">
                            </div>
                            
                            <div class="mb-2">
                                <p class="card-text mt-1"><strong>Nacionalidad: </strong> {{$participant->nationality}}</p>
                                <p class="card-text mt-1"><strong>Nombre: </strong>{{$participant->name}}</p>
                                <p class="card-text mt-1"><strong>Edad:  </strong>{{$participant->birthday}}</p>
                                <p class="card-text mt-1"><strong> Genero:  </strong>{{$participant->sexo}}</p>            
                                <div class="text-center">
                                    <button href="{{route('participants.show')}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ver">Ver</button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#asignar" class="btn btn-warning">Agregar Medallas</button>
                                </div>
                            </div>

                       </div>
                  </div>
                @endforeach
                </div>
                <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
                            <span class="p-2">{!! $participants->links('pagination::bootstrap-4') !!}</span>
               </div>
                </div>
            </div>
                <div class="modal" tabindex="-1" id="asignar" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <div class="modal-body">
                    <form action="">
                         <div>
                                <label for="awars">Escoja la medalla a asignar</label> 
                                <select class="form-select" name="awars" id="awars">
                                    <option value="1">oro</option>
                                    <option value="2">Plata</option>
                                    <option value="3">Bronce</option>
                                </select>
                        </div>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="asignar" class="btn btn-primary">Asignar</button>
                        <button type="button" id="cerrar" class="btn btn-danger"
                        data-bs-dismiss="modal">Cerrar</button>
                        </form>
                        </div>
                        </div>
                    </div>
            </div>

            

            </div>
                <div class="modal" tabindex="-1" id="ver" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <div class="modal-body">
                         <div>
                            
                                <div><img src="data.png"></div>
                                <div class ="mt-2">
                                <P>DOCUMENTO</P>
                                <P>CEDULA</P>
                                <P>DIRECCION</P>
                                <P>ESCUELAS</P>
                                </div>
                                
                        </div>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="asignar" class="btn btn-primary">Asignar</button>
                        <button type="button" id="cerrar" class="btn btn-danger"
                        data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        </div>
                    </div>
            </div>

           
        </div>
                
    </div>
</div>


@endsection
