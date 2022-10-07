@extends('layouts.app')

@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="container d-flex">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                @can('/participantes/registro')
                    <div class="d-flex flex-row-reverse">
                        <a class="btn btn-primary mb-2" aria-current="page" href="/participantes/registro">Registrar</a>
                    </div>
                @endcan
                <div class="card mb-5 row">
                    <div class="card-header text-center">
                        <h1> <strong>{{ __('Listado de Participantes') }}</strong></h1>
                    </div>
                    <div class="card-body">
                        <livewire:participants />

                        <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
                            <span class="p-2">{!! $participants->links('pagination::bootstrap-4') !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
