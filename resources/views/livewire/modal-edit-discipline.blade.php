<div class="modal" tabindex="-1" class="modal fade @if ($show === true) show @endif" id="myExampleModal"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">
    <div class="modal-dialog" role="document">
        @if ($discipline)
            <form action="/disciplinas/{{ $discipline->id }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center"><strong>Editar Disciplinas</strong></h5>
                        <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                            aria-label="close"></i>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div>
                            <strong class="d-inline-block">Nombre de Disciplina</strong>
                            <input type="text" name="discipline" id="discipline" class="form-control"
                                value="{{ $discipline->discipline }}" required>
                            <strong class="d-inline-block">descripcion</strong>
                            <textarea type="text" name="description" id="description" class="form-control" value="{{ $discipline->description }}"
                                required></textarea>
                            <strong class="d-inline-block">Deporte al que pertenece</strong>
                            <select name="sport_id" id="sport_id" class="form-select" required>
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                                @endforeach

                            </select>
                            <strong class="d-inline-block">Imagen</strong>
                            <input type="file" name="discipline_image" name="discipline_image" class="form-control">
                            <strong class="d-inline-block">Genero</strong>
                            <select name="gender_id" class="form-select" id="gender_id">
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No binario</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" class="btn btn-danger" data-bs-dismiss="modal"
                                wire:click.prevent="doClose()">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
