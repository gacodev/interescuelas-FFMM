@extends('layouts.app')

@section('content')
<div class="container">
    @can('/participantes/registro')
            <div class="d-flex flex-row-reverse">
            <a class="btn btn-primary mb-2" aria-current="page" href="/participantes/registro">Agregar Disciplina</a>
            </div>
    @endcan
    <div class="table-responsive">
    <table class="table table-hover table-default border border-dark rounded-2">
        <thead class="table-dark">
            <tr class="text-center">
            <th scope="col">Deporte</th>
            <th scope="col">Disciplina</th>
            <th scope="col">Genero</th>
            <th scope="col">descripcion</th>
            @role('admin')
            <th scope="col"></th>
            <th scope="col"></th>
            @endrole
            </tr>
        </thead>

        @foreach($disciplines as $discipline)
            <tr class="text-center">
                <th>{{$discipline->sport}}</th>
                <td>{{$discipline->discipline}}</td>
                <td>{{$discipline->sexo}}</td>
                <td>{{$discipline->description}}</td>
                @role('admin')
                <td><button class="btn btn-warning">Editar</button></td>
                <td><button class="btn btn-danger">Eliminar</button></td>
                @endrole
            </tr>
        @endforeach    
    </table>
</div>
</div>
@endsection