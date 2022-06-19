@extends('layouts.app')
@section('content')
    <div required class="container">
        <div required class="row justify-content-center">


            <div class="col-sm-9 justify-content-center">

                {!! Form::open(['url' => 'staff/create', 'method' => 'post']) !!}

                <div>
                    <div required class="d-flex flex-row-reverse mb-2">
                        <a required class="btn btn-primary d-flex-inline"href="{{ route('participants.show') }}"> Ver
                            Participantes</a>
                    </div>
                    <h2 required class="text-center"><strong>XXVIII Juegos Inter escuelas de Cadetes 2022-Ejercito</strong>
                    </h2>
                    <h2 required class="text-center"><strong>Registrar Staff</strong></h2>

                    <div required class="form-group mt-2">

                        {{ Form::label('Fuerza', null, ['class' => 'control-label']) }}
                        {{ Form::select('force_id', array_merge(['0' => 'Seleccione la fuerza a la que pertenece'], $forceValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'force'], [])) }}

                        @if ($errors->has('force_id'))
                            {{ $errors->first('force_id') }}
                        @endif
                    </div>

                    <div required class="form-group mt-2">
                        {{ Form::label('Grado', null, ['class' => 'control-label']) }}
                        {{ Form::select('grade_id', [], null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'grades'], [])) }}
                        @if ($errors->has('grade_id'))
                            {{ $errors->first('grade_id') }}
                        @endif
                    </div>

                    <div required class="form-group mt-3">
                        <label>Nombre Completo</label>
                        <input type="text" name="name" required class="form-control">
                        @if ($errors->has('name'))
                            {{ $errors->first('name') }}
                        @endif
                    </div>

                    <div required class="form-group mt-3">
                        <label>Numero de documento</label>
                        <input type="number" name="identification" required class="form-control">
                        @if ($errors->has('identification'))
                            {{ $errors->first('identification') }}
                        @endif
                    </div>

                    <div required class="form-group mt-2">
                        {{ Form::label('Deporte al que pertenece', null, ['class' => 'control-label']) }}
                        {{ Form::select('sport_id', array_merge(['0' => 'Seleccione el deporte'], $sportValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true], [])) }}
                        @if ($errors->has('sport_id'))
                            {{ $errors->first('sport_id') }}
                        @endif
                    </div>

                    @if (request()->get('success'))
                        <br>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            Se Creo el integrante satisfactoriamente!
                        </div>
                    @endif



                    <div required class="form-group mt-2 text-center">
                        <button type="submit" required class="btn btn-success col-sm-2 col-md-3 col-xs-2">
                            Registrar
                        </button>
                    </div>
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
                    console.log(res.data)
                    insertGrades(res.data)
                })
        }

        let force = document.getElementById("force");
        force.addEventListener("change", getForce)
    </script>
@endsection
