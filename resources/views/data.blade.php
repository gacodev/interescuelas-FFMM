@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="card">
                <div class="card-header text-center"><h1> <strong>{{ __('Listado de Participantes') }}</strong></h1></div>
                <div class="card-body">
                    @foreach($participants as $participant)

                        <div class="card border-dark m-3 d-inline-block" style="max-width: 20rem;">
                        <div class="card-header text-center text-white" style="background-color:{{$participant->color}}"><strong>{{$participant->force}}</strong>  <img src="{{$participant->image}}" width="50" height="50" alt="" class="d-inline"></div>
                        <img class="img-card" src={{$participant->photo}} alt="" width="300" height="250">
                        <div class="card-body text-dark">
                            <h5 class="card-title text-center text-uppercase"><strong>{{$participant->sport}} </strong></h5>
                            <div>
                            <img src="{{$participant->flag_image}}" width="50" height="50" alt="" class="d-inline">
                            </div>
                            <p class="card-text"><strong>Nacionalidad: </strong> {{$participant->nationality}}</p>
                            <p class="card-text"><strong>Nombre: </strong>{{$participant->name}}</p>
                            <p class="card-text"><strong>Edad:  </strong>{{$participant->birthday}}</p>
                            <p class="card-text"><strong> Genero:  </strong>{{$participant->sexo}}</p>
                            <p class="card-text"><strong> Medallas de Oro  </strong>{{$participant->gold}}</p>
                            <p class="card-text"><strong> Medallas de Plata  </strong>{{$participant->silver}}</p>
                            <p class="card-text"><strong> Medallas de Bronce  </strong>{{$participant->bronze}}</p>
                            <div class="text-center">
                                <a href="{{route('participants.show')}}" class="btn btn-primary">Ver</a>
                                <a href="" class="btn btn-warning">Agregar Medallas</a>
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
