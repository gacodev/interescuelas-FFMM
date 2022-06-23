@extends('layouts.app')
@section('content')
    <div required class="container">
        <div required class="row justify-content-center">
            <form required class="col-sm-9 justify-content-center">

                <div>
                    <div required class="d-flex flex-row-reverse justify-content-center mb-2">
                        <a required class="btn btn-primary m-1 d-flex-inline"href="{{ route('staff.index') }}"> Registrar
                            Staff</a>
                        <a required class="btn btn-primary m-1 d-flex-inline"href="{{ route('participants.show') }}"> Ver
                            Participantes</a>
                        <a required class="btn btn-success m-1 d-flex-inline"href="{{ route('participants.show') }}"> Cargar
                            en Excel</a>
                    </div>
                    <h2 required class="text-center"><strong>XXVIII Juegos Inter escuelas de Cadetes 2022-Ejercito</strong>
                    </h2>
                    <h2 required class="text-center"><strong>Registro de Participantes</strong></h2>


                    <div required class="form-group mt-4">
                        <label>Documento de identidad</label>
                        <input type="number" required class="form-control">
                    </div>

                    <div required class="form-group mt-2">

                        {{ Form::label('Tipo de documento', null, ['class' => 'control-label']) }}
                        {{ Form::select('type_doc', array_merge(['0' => 'Seleccione su tipo de documento'], $typeDocValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'type_doc'], [])) }}

                        @if ($errors->has('type_doc'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('type_doc') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>


                    <div required class="form-group mt-2">

                        {{ Form::label('Fuerza', null, ['class' => 'control-label']) }}
                        {{ Form::select('force_id', array_merge(['0' => 'Seleccione la fuerza a la que pertenece'], $forceValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'force'], [])) }}

                        @if ($errors->has('force_id'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('force_id') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
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
                        <input type="text" required class="form-control">
                    </div>


                    <div required class="form-group mt-2">
                        <label>Grupo Sanguineo</label>
                        <select required class="form-control">
                            <option> seleccione un grupo sanguineo</option>
                            <option> A+</option>
                            <option> A-</option>
                            <option> B+</option>
                            <option> B-</option>
                            <option> AB+</option>
                            <option> AB-</option>
                            <option> O+</option>
                            <option> O-</option>

                        </select>
                    </div>

                    <div required class="form-group mt-3">
                        <label>Estatura</label>
                        <input type="number" required class="form-control">
                    </div>

                    <div required class="form-group mt-3">
                        <label>Peso</label>
                        <input type="number" required class="form-control">
                    </div>

                    <div required class="form-group mt-3">
                        <label><strong>Fotografía en Uniforme No.3 sin gorra fondo blanco</strong></label>
                        deportista y sigla de la Escuela)</label>
                        <input type="file" required class="form-control">
                    </div>


                    <div required class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" required class="form-control">
                    </div>

                    <div required class="form-group mt-3">
                        <label>Fecha de nacimiento</label>
                        <input type="date" required class="form-control">
                    </div>




                    <div required class="form-group mt-2">
                        {{ Form::label('Deporte al que pertenece', null, ['class' => 'control-label']) }}
                        {{ Form::select('sport_id', array_merge(['0' => 'Seleccione el deporte'], $sportValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'sport_id'], [])) }}


                        @if ($errors->has('sport_id'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('sport_id') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>


                    <div required class="form-group mt-2">
                        <label>Sexo</label>
                        <select name="gender_id" required class="form-control" id="gender_id">
                            <option value="0">Seleccione su genero</option>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                            <option value="3">No Binario</option>
                        </select>
                    </div>

                    <div required class="form-group mt-2">
                        {{ Form::label('Categories', null, ['class' => 'control-label']) }}
                        {{ Form::select('categories_id', [], null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'categories'], [])) }}

                        @if ($errors->has('grade_id'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('grade_id') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>




                    <div required class="form-group mb-5 mt-2 text-center">
                        <button type="submit" required class="btn btn-primary col-sm-2 col-md-3 col-xs-2">
                            Registrar
                        </button>
                        <button type="submit" required class="btn btn-succes col-sm-2 col-md-3 col-xs-2">
                            Descargar Formato
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let grades = document.getElementById("grades");
        let categories = document.getElementById("categories");

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




        function insertCategories(data) {
            let options = `<option value="0"></option>`;

            data.map(element => {
                options += `<option value="${element.id}">${element.categorie}</option>`;
            })

            categories.innerHTML = options;
        }

        function getCategories(e) {
            let sport_id = sport.value;
            let gender_id = gender.value;

            console.log(gender_id)
            console.log(sport_id)
            if (sport_id > 0 && gender_id > 0) {
                axios.get(`/sports/${sport_id}/gender/${gender_id}/categories`)
                    .then(res => {
                        console.log(res.data)
                        insertCategories(res.data)
                    })
            }

        }

        let sport = document.getElementById("sport_id");
        let gender = document.getElementById("gender_id");

        sport.addEventListener("change", getCategories)
        gender.addEventListener("change", getCategories)
    </script>
@endsection
