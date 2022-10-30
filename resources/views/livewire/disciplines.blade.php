<div>
    @can('/participantes/registro')
            <div class="d-flex flex-row-reverse">
            <button class="btn btn-primary mb-2" data-bs-toggle="modal"
            data-bs-target="#agregar" aria-current="page">Agregar Disciplina</button>
            </div>
    @endcan
    <div class="form-inline d-flex justify-content-center active-pink-2 mt-2 mb-3 col-6 m-auto">
        <input class="col-4 mr-2 form-control" type="text" name="busqueda" wire:model="search">
        <i class="bi bi-search p-2"></i>
    </div>
        <div>
            <p><strong>DISCIPLINAS: </strong>{{$total}}</p>
        </div>

    <div class="table-responsive">
        <table class="table table-hover table-default border border-dark rounded-2">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Deporte</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Genero</th>
                    @role('admin')
                        <th scope="col"></th>
                    @endrole
                </tr>
            </thead>

            @foreach ($disciplines as $discipline)
                <tr class="text-center">
                    <th>{{ $discipline->id }}</th>
                    <th>{{ $discipline->sport->sport }}</th>
                    <td>{{ $discipline->discipline }}</td>
                    <td>{{ $discipline->gender->sexo }}</td>

                    @role('admin')
                        <td>  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar{{$discipline->id}}">Editar</button></td>
                    @endrole
                </tr>

                <div class="modal" tabindex="-1" id="editar{{ $discipline->id }}" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center"><strong>Editar Disciplinas</strong></h5>
                                <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                                aria-label="close"></i>
                            </div>
                            <div class="modal-body">
                                <form action="/disciplinas/{{ $discipline->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <strong class="d-inline-block">Nombre de Disciplina</strong>
                                        <input type="text" name="discipline" id="discipline" class="form-control" value="{{ $discipline->discipline }}" required>
                                        <strong class="d-inline-block">descripcion</strong>
                                        <textarea type="text" name="description" id="description" class="form-control" value="{{ $discipline->description }}" required></textarea>
                                        <strong class="d-inline-block">Deporte al que pertenece</strong>
                                        <select name="sport_id" id="sport_id" class="form-select" required>
                                            @foreach ($sports as $sport )
                                                 <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                                            @endforeach

                                        </select>
                                        <strong class="d-inline-block">Imagen</strong>
                                        <input type="file" name="discipline_image" name="discipline_image"
                                            class="form-control">
                                        <strong class="d-inline-block">Genero</strong>
                                        <select name="gender_id" class="form-select" id="gender_id">
                                            <option value="1">Masculino</option>
                                            <option value="2">Femenino</option>
                                            <option value="3">No binario</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        <button type="button" id="cancelar" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </table>

        <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
            <span class="p-2">{!! $disciplines->links() !!}</span>
        </div>

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p class="text-center">{!! \Session::get('success') !!}</p>
            </div>
        @endif
        <div class="modal" tabindex="-1" id="agregar" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center"><strong>Agregar Disciplinas</strong></h5>
                        <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                        aria-label="close"></i>
                    </div>
                    <div class="modal-body">
                        <form action="/disciplinas/create" method="POST">
                            @csrf
                            @method('POST')
                            <div>
                                <strong class="d-inline-block">Nombre de Disciplina</strong>
                                <input type="text" name="discipline" id="discipline"class="form-control" required>
                                <strong class="d-inline-block">descripcion</strong>
                                <textarea type="text" name="description" id="description" class="form-control" required></textarea>
                                <strong class="d-inline-block">Deporte al que pertenece</strong>
                                <select name="sport_id" id="sport_id" class="form-select" required>
                                    @foreach ($sports as $sport )
                                                 <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                                    @endforeach
                                </select>
                                <strong class="d-inline-block">Imagen</strong>
                                <input type="file" name="discipline_image" name="discipline_image"
                                    class="form-control" required>
                                <strong class="d-inline-block">Genero</strong>
                                <select name="gender_id" class="form-select" id="gender_id">
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                    <option value="3">No binario</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Crear</button>
                                <button type="button" id="cancelar" class="btn btn-danger"
                                    data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
