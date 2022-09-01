@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="card mb-5 row">
                <div class="card-header text-center"><h1> <strong>{{ __('Listado de Participantes') }}</strong></h1></div>
                <div class="card-body">
               
               
                <div class="col-12">
                <form class="form-inline d-flex justify-content-center md-form form-sm active-pink-2 mt-2 mb-3">
                <input class="col-4 mr-2" type="text" placeholder="Buscar"
                    aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
                <button class="btn btn-primary ml-2">Buscar</button>
                </form>
                </div>


                @foreach($participants as $participant)
                        
                        <div class="card border-dark  mx-1 d-inline-block col-3">
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
                <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
                            <span class="p-2">{!! $participants->links('pagination::bootstrap-4') !!}</span>
               </div>
                </div>
            </div>

           
        </div>
                
    </div>
</div>
@endsection
