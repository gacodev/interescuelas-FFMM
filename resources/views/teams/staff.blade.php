@extends('layouts.app')
@section('content')
    <div required class="container">
        <div required class="row justify-content-center">


            <div class="col-sm-9 justify-content-center mb-4 ">

                {!! Form::open(['url' => 'staff/create', 'method' => 'post']) !!}

                    <h2 required class="text-center"><strong>XXVIII Juegos Inter escuelas de Cadetes 2022-Ejercito</strong>
                    </h2>
                    <h2 required class="text-center"><strong>Registrar Equipos</strong></h2>

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

                    <div required class="form-group mt-2">
                        {{ Form::label('Grado', null, ['class' => 'control-label']) }}
                        {{ Form::select('grade_id', [], null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'grades'], [])) }}

                        @if ($errors->has('grade_id'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('grade_id') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div required class="form-group mt-3">
                        <label>Nombre Completo</label>
                        <input type="text" name="name" required class="form-control" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('name') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div required class="form-group mt-3">
                        <label>Numero de documento</label>
                        <input type="number" name="identification" required class="form-control"
                            value="{{ old('identification') }}">

                        @if ($errors->has('identification'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('identification') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
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

    <script>
        let grades = document.getElementById("grades");

        function insertGrades(data) {
            let options = `<option value="0"></option>`;

            data.map(element => {
                options += `<option value="${element.id}">${element.grade}</option>`;
            })

            grades.innerHTML = options;
        }

        function getForce(e) {
            let value = e.target.value;
            axios.get(`/forces/${value}/grade`)
                .then(res => {
                    insertGrades(res.data)
                })
        }

        let force = document.getElementById("force");
        force.addEventListener("change", getForce)

        function initialForce() {
            let value = force.value;
            axios.get(`/forces/${value}/grade`)
                .then(res => {
                    insertGrades(res.data)
                })
        }

        window.onload = initialForce;
    </script>
@endsection
