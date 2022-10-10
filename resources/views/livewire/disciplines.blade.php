<div>
        <div class="form-inline d-flex justify-content-center active-pink-2 mt-2 mb-3 col-6 m-auto">
                <input class="col-4 mr-2 form-control" type="text" name="busqueda" wire:model="search">
                <i class="bi bi-search p-2"></i>
        </div>

<div class="table-responsive">
    <table class="table table-hover table-default border border-dark rounded-2">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">#</th>
            <th scope="col">Deporte</th>
            <th scope="col">Disciplina</th>
            <th scope="col">descripcion</th>
            <th scope="col">Genero</th>
            @role('admin')
            <th scope="col"></th>
            <th scope="col"></th>
            @endrole
            </tr>
        </thead>

        @foreach($disciplines as $discipline)
            <tr class="text-center">
                <th>{{$discipline->id}}</th>
                <th>{{$discipline->sport}}</th>
                <td>{{$discipline->discipline}}</td>
                <td>{{$discipline->description}}</td>
                <td>{{$discipline->sexo}}</td>

                @role('admin')
                <td><button class="btn btn-warning">Editar</button></td>
                <form action="/disciplinas/{{$discipline->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <td><button class="btn btn-danger" id="eliminar_disciplina">Eliminar</button></td>
                </form>
                @endrole
            </tr>

        @endforeach

    </table>
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
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
        <form action="/disciplinas/create" method="POST">
            @csrf
            @method('POST')
            <div>
                <strong class="d-inline-block">Nombre de Disciplina</strong>
                <input type="text" name ="discipline" id="discipline"class="form-control" required>
                <strong class="d-inline-block">descripcion</strong>
                <textarea type="text" name ="description" id="description" class="form-control" required></textarea>
                <strong class="d-inline-block">Deporte al que pertenece</strong>
                <select name="sport_id" id="sport_id" class="form-select" required>
                    <option value="1">Futbol</option>
                    <option value="2">Atletismo</option>
                </select>
                <strong class="d-inline-block">Imagen</strong>
                <input type="file" name ="discipline_image" name="discipline_image" class="form-control" required>
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
