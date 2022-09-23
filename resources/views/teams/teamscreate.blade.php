@extends('layouts.app')
@section('content')
    <div required class="container">
        <div required class="row">

    <div class="card container col-sm-9">
                <div class="d-flex justify-content-center mb-4">
                    {!! Form::open(['url' => '/equipos/crear', 'method' => 'post']) !!}
                        <h2 required class="text-center"><strong>Crear Equipos</strong></h2>

                        <div required class="form-group mt-1">

                            {{ Form::label('Fuerza', null, ['class' => 'control-label']) }}
                            {{ Form::select('force_id', array_merge(['0' => 'Seleccione la fuerza a la que pertenece'], $forceValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'force'], [])) }}

                            @if ($errors->has('force_id'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $errors->first('force_id') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>

                        <div required class="form-group mt-3">
                            <label>Nombre del Equipo</label>
                            <input type="text" name="name" required class="form-control">
                        </div>


                        <div required class="form-group mt-2">
                            {{ Form::label('Deporte al que pertenece', null, ['class' => 'control-label']) }}
                            {{ Form::select('sport_id', array_merge(['0' => 'Seleccione el deporte'], $sportValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true], [])) }}


                            @if ($errors->has('sport_id'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $errors->first('sport_id') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>

                        <div required class="form-group mt-2">
                            {{ Form::label('Disciplina a la que pertenece', null, ['class' => 'control-label']) }}
                            {{ Form::select('discipline_id', array_merge(['0' => 'Seleccione el deporte'],
                                 $sportValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true], [])) }}


                            @if ($errors->has('discipline_id'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $errors->first('discipline_id') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>

                        @if (Session::has('status'))
                            <br>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('status') }}!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div required class="form-group mt-2 text-center">
                            <button type="submit" required class="btn btn-success col-sm-2 col-md-3 col-xs-2">
                                Registrar
                            </button>
                        </div>
                    

                    {!! Form::close() !!}
                </div>
    </div>


        </div>
    </div>

    <script>

        function getDisciplines(e) {
            let value = e.target.value;
            axios.get(`/disciplines/${value}`)
                .then(res => {
                    insertDisciplines(res.data)
                })
        }

        window.onload = initialForce;
    </script>
@endsection
