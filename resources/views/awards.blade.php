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
                      <th>Competencia</th>
                      <th>Escuela</th>
                      <th>Masculina</th>
                      <th>Femenina</th>
                      <th>Mixta</th>
                      <th>X Equipos</th>
                      <th>agregar</th>
                      <th>editar</th>

                    </tr>
                  </thead>
                  <tbody>
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
                            <p class="fw-bold mb-1 text-center">Futbol</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="fw-normal mb-1">Escuela Militar de Aviacion</p>
                      </td>
                  
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>
                        <button type="button" class="btn btn-sm btn-rounded btn-success">
                        Agregar
                        </button>
                      </td>
                      <td>
                      <button type="button" class="btn btn-sm btn-rounded btn-warning">
                          editar
                        </button>
                      </td>
                    </tr>
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
                
                @foreach($participants as $participant)

                  <div class="card border-dark my-1 d-inline-block ">
                  <div class="card-header text-center text-white" style="background-color:{{$participant->color}}">
                  <strong>{{$participant->force}}</strong>  
                  <img src="{{$participant->image}}" width="50" height="50" alt="" class="d-inline"></div>
                  <img class="img-card" src={{$participant->photo}} alt="" width="150" height="100">
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
                          <a href="{{route('participants.show')}}" class="btn btn-primary">Ver</a>
                          <a href="" class="btn btn-warning">Agregar Medallas</a>
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
@endsection