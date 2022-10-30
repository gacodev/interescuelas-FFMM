<div class="modal" tabindex="-1" class="modal fade @if ($show === true) show @endif" id="myExampleModal"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">
    <div class="modal-dialog" role="document">
        @if ($participant)
            <form action="/participantes/asociar" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center"><strong>Asociar disciplina</strong></h5>

                        <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                            aria-label="close"></i>

                    </div>
                    <div class="modal-body">

                        @csrf
                        <input type="hidden" name="participant_id" value="{{ $participant->id }}">
                        <strong class="d-inline-block text-center">Lista de equipos</strong>
                        <select class="form-select" name="discipline_id" id="disciplines">
                            @foreach ($disciplines as $discipline)
                                <option value="{{ $discipline->id }}">
                                    {{ $discipline->discipline }}</option>
                            @endforeach
                        </select>
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
