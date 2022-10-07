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
</div>
</div>
