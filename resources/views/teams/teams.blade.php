@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-4">

            <div class="d-flex flex-row-reverse">
                <a required class="btn btn-primary m-1" href="{{ route('teams.form') }}"> Crear Equipos</a>
            </div>

            <div class="card col-12 mb-4">
                        <div class="card-header text-center"><h1> <strong>{{ __('Listado de Equipos') }}</strong></h1></div>
                        @livewire('teams')
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
