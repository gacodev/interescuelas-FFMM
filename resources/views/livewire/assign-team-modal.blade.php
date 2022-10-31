<div class="modal" tabindex="-1" class="modal fade @if ($show === true) show @endif"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">

@if($team)
        <form action="/equipos/asociarparticipante/" method="POST">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                            aria-label="close"></i>
                    </div>
                    <div class="modal-body">


                        <div>
                            <input type="hidden" name="team_id" id="team_id" value="{{ $team->id }}" >
                            <input type="hidden" name="discipline_id" id="discipline_id" value="{{ $team->discipline_id }}">
                            <label for="participants">Escoja el participante a asociar</label>
                            <select class="form-select" name="participant_id" id="participant_id">
                                @foreach ( $participants as $participant)
                                <option value="{{ $participant->id }}">{{ $participant->name }}</option>
                                @endforeach


                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="asociar" class="btn btn-primary">asociar</button>
                        <button type="button" id="cerrar" class="btn btn-danger" data-bs-dismiss="modal"
                            wire:click.prevent="doClose()">Cerrar</button>
                    </div>
                </div>
            </div>
        </form>
        @endif
</div>
