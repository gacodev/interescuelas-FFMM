@extends('layouts.app')
@section('content')
    <div required class="container">
        <div required class="row justify-content-center">
            <form required class="col-sm-9 justify-content-center">

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
                        {{ Form::select('force', array_merge(['0' => 'Seleccione la fuerza a la que pertenece'], $forceValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'force'], [])) }}

                    </div>

                    <div required class="form-group mt-2">
                        {{ Form::label('Grado', null, ['class' => 'control-label']) }}
                        {{ Form::select('grades', [], null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'grades'], [])) }}
                    </div>

                    <div required class="form-group mt-3">
                        <label>Nombre Completo</label>
                        <input type="text" required class="form-control">
                    </div>

                    <div required class="form-group mt-3">
                        <label>Numero de documento</label>
                        <input type="number" required class="form-control">
                    </div>

                    <div required class="form-group mt-2">
                        {{ Form::label('Deporte al que pertenece', null, ['class' => 'control-label']) }}
                        {{ Form::select('sport', $sportValues, null, array_merge(['class' => 'form-control', 'required' => true], [])) }}
                    </div>

                    <div required class="form-group mt-2 text-center">
                        <button type="submit" required class="btn btn-success col-sm-2 col-md-3 col-xs-2">
                            Registrar
                        </button>
                    </div>
                </div>
            </form>
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
