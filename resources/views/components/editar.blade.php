@extends('layouts.app')
@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="container d-flex">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="card mb-5 row">
                    <div class="card-header text-center">
                        <h1> <strong>{{ __('Editar de Participantes') }}</strong></h1>
                    </div>
                    @livewire('edit-participant')
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
