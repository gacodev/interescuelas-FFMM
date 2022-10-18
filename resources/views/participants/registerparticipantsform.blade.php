@extends('layouts.app')
@section('content')
<div required class="container">
    <div required class="row justify-content-center">
        <div class="col-sm-9 justify-content-center">

            {!! Form::open(['url' => 'participantes/crear', 'method' => 'post']) !!}

            @if (Session::has('status'))
            <br>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('status') }}!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div required class="d-flex flex-row-reverse mb-2">
                <a required class="btn btn-success m-1 d-flex-inline" href="{{ route('excel.imports') }}">
                    Importe un Excel</a>
            </div>
            <div class="card">
                <div class="m-3">
                    <h2 required class="text-center"><strong>Interescuelas</strong></h2>
                    <h2 required class="text-center"><strong>Registro de Participantes</strong></h2>
                    <div required class="form-group mt-4">
                        <label>Documento de identidad</label>
                        <input type="number" name="#identification" required class="form-control">
                    </div>

                    <div required class="form-group mt-2">

                        {{ Form::label('Nacionalidad', null, ['class' => 'control-label']) }}
                        {{ Form::select('nationality_id', array_merge(['0' => 'Seleccione su nacionalidad'], $nationalityValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'nationality_id'], [])) }}

                        @if ($errors->has('nationality_id'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('nationality_id') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>

                    <div required class="form-group mt-2">

                        {{ Form::label('Tipo de documento', null, ['class' => 'control-label']) }}
                        {{ Form::select('type_doc_id', array_merge(['0' => 'Seleccione su tipo de documento'], $typeDocValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'type_doc_id'], [])) }}

                        @if ($errors->has('type_doc_id'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('type_doc_id') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>


                    <div required class="form-group mt-2">

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
                        <label>Nombre Completo</label>
                        <input type="text" name="name" required class="form-control">
                    </div>


                    <div required class="form-group mt-2">
                        <label>Grupo Sanguineo</label>
                        <select required class="form-control" name="blood_type">
                            <option> seleccione un grupo sanguineo</option>
                            <option value="A+"> A+</option>
                            <option value="A-"> A-</option>
                            <option value="B+"> B+</option>
                            <option value="B-"> B-</option>
                            <option value="AB+"> AB+</option>
                            <option value="AB-"> AB-</option>
                            <option value="O+"> O+</option>
                            <option value="O-"> O-</option>

                        </select>
                    </div>

                    <div required class="form-group mt-3">
                        <label>Estatura</label>
                        <input type="number" name="height" required class="form-control">
                    </div>

                    <div required class="form-group mt-3">
                        <label>Peso</label>
                        <input type="number" name="weight" required class="form-control">
                    </div>

                    <div required class="form-group mt-3">
                        <label><strong>Fotografía en Uniforme No.3 </label>
                        <input type="file" name="photo" required class="form-control">
                    </div>


                    <div required class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control">

                        @if ($errors->has('email'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('email') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>



                    <div required class="form-group mt-3">
                        <label>Fecha de nacimiento</label>
                        <input type="date" name="birthday" id="datepicker" required class="form-control">
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





                    <div required class="form-group mb-2 mt-4 text-center">
                        <button type="submit" required class="btn btn-primary col-sm-2 col-md-3 col-xs-2">
                            Registrar
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
