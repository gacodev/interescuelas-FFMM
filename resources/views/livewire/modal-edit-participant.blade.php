<div class="modal text-left" tabindex="-1" class="modal fade @if ($show === true) show @endif"
    id="myExampleModal"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">
    <div class="modal-dialog" role="document">
        @if ($participant)
            <form action="/participantes/{{ $participant->id }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Edicion de Datos</strong></h5>
                        <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                            aria-label="close"></i>
                    </div>
                    <div class="modal-body">

                        @csrf
                        @method('PUT')
                        <strong class="d-inline-block">Documento</strong>
                        <input type="text" name="identification" class="form-control" disabled
                            value="{{ $participant->identification }}">
                        <strong class="d-inline-block">Nombre</strong>
                        <input type="text" name="name" class="form-control" value="{{ $participant->name }}">
                        <strong class="d-inline-block">Telefono</strong>
                        <input type="text" name="phone" class="form-control" value="{{ $participant->phone }}">
                        <strong class="d-inline-block">Foto</strong>
                        <input type="file" name="photo" class="form-control" value="{{ $participant->photo }}">
                        <strong class="d-inline-block">RH</strong>
                        <input type="text" name="blood_id" class="form-control" value="{{ $participant->blood_id }}">
                        <strong class="d-inline-block">Peso</strong>
                        <input type="text" name="weight" class="form-control" value="{{ $participant->weight }}">
                        <strong class="d-inline-block">Estatura</strong>
                        <input type="text" name="height" class="form-control" value="{{ $participant->height }}">
                        <strong class="d-inline-block">Genero</strong>
                        <input type="text" name="gender_id" class="form-control"
                            value="{{ $participant->gender_id }}">
                        <strong class="d-inline-block">Fecha de Nacimiento</strong>
                        <input type="text" name="birthday" class="form-control" value="{{ $participant->birthday }}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                        <button type="button" id="cancelar" class="btn btn-danger" data-bs-dismiss="modal"
                            wire:click.prevent="doClose()">Cancelar</button>

                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
