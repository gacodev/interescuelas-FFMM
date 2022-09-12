@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="card d-flex mb-4 border border-dark justify-content-center">
                <div class="card-header text-center"><h1> <strong> {{__('Tabla de medalleria General')}} </strong></h1></div>
                <div class="card-body">


                <div>
                <table class="table align-middle mb-0 bg-white">
                  <thead class="bg-light">
                  
                    <tr>
                      <th>Deporte</th>
                      <th>Masculina</th>
                      <th>Femenina</th>
                      <th>Equipos</th>
                      <th>Oro</th>
                      <th>Plata</th>
                      <th>Bronce</th>
                      <th>Total</th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($sports as $sport)
                    <tr>
                      <td>
                        <div class="d-flex align-items-center justify-content-center">
                          <img
                              src="http://www.eltiempo.com/files/image_640_428/files/crop/uploads/2017/04/20/58f8da4442d5b.r_1492703844808.0-0-3000-1500.jpeg"
                              alt=""
                              style="width: 45px; height: 45px"
                              class="rounded-circle"
                              />
                          <div class="ms-3">
                          
                      
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                         
                    </tr>
                    @endforeach
                  </tbody>
                </table> 
                
                </div>                              
                </div>
            </div>

            <div class="card mt-4 mb-4 d-flex border border-dark justify-content-center">
                <div class="card-header text-center"><h1> <strong> {{__('Multimedallistas')}} </strong></h1></div>
                <div class="card-body">

                <div>
                 
                </div>

                
                <div>
                @foreach($participants as $participant)

                  <div class="card border-dark my-1 d-inline-block ">
                  <div class="card-header text-center text-white" style="background-color:{{$participant->color}}">
                  <strong>{{$participant->force}}</strong>  
                  <img src="{{$participant->force_image}}" width="50" height="50" alt="" class="d-inline"></div>
                  <img class="img-card" src="{{$participant->photo}}" alt="" width="150" height="100">
                  <div class="card-body text-dark">
                      <div>
                      <img src="{{$participant->flag_image}}" width="50" height="50" alt="" class="d-inline">
                      </div>
                      <div class="">
                      <div class="mb-2 text-left">
                      <p class="card-text lh-1 mt-2"><strong>Nacionalidad: </strong> {{$participant->nationality}}</p>
                      <p class="card-text lh-1"><strong>Nombre: </strong>{{$participant->name}}</p>
                      <p class="card-text lh-1"><strong>Edad:  </strong>{{$participant->birthday}}</p>
                      <p class="card-text lh-1"><strong> Genero:  </strong>{{$participant->sexo}}</p>
                      </div>                 
                      <div class="text-center">
                        <button type="button" class="m-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#ver{{$participant->id}}">Ver</button>
                      </div>
                      </div>
                  </div>
                  </div>



                  <div class="modal" tabindex="-1" id="ver{{$participant->id}}" role="dialog">
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
                            
                                aqui ira el contenido del perfil del participante                   
                        </div>   
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" id="cerrar" class="btn btn-danger"
                        data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        </div>
                    </div>
                </div>
                  @endforeach
                  </div>
                </div>

            </div>
        </div>
    </div>

    
</div>
@endsection
