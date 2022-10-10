@extends('layouts.app')

@section('content')
<div class="container">
    @can('/participantes/registro')
            <div class="d-flex flex-row-reverse">
            <button class="btn btn-primary mb-2" data-bs-toggle="modal"
            data-bs-target="#agregar" aria-current="page">Agregar Disciplina</button>
            </div>
    @endcan
    @livewire('disciplines')
</div>
@endsection
