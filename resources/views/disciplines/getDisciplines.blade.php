@extends('layouts.app')

@section('content')
<div class="container">
    @can('/participantes/registro')
            <div class="d-flex flex-row-reverse">
            <a class="btn btn-primary mb-2" aria-current="page" href="/participantes/registro">Agregar Disciplina</a>
            </div>
    @endcan
    @livewire('disciplines')
</div>
@endsection
