<div class="modal" tabindex="-1" class="modal fade @if ($show === true) show @endif" id="myExampleModal"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">
    <div class="modal-dialog" role="document">
        @if ($disciplineParticipant)
            <form action="/equipos/desasociar" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>

                        <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                            aria-label="close"></i>

                    </div>

                    <div class="modal-body">

                        <p>va a eliminar a
                            <strong>{{ $disciplineParticipant->participant->name }}</strong>
                            del equipo
                        </p>
                        <p>va a eliminar a
                            <strong>{{ $disciplineParticipant->participant_id }}</strong>
                            del equipo
                        </p>
                        <input type="hidden" name="discipline" value="{{ $disciplineParticipant->discipline_id }}">
                        <input type="hidden" name="id" value="{{ $disciplineParticipant->participant->id }}">
                        <input type="hidden" name="team" value="{{ $disciplineParticipant->team_id }}">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="desasociar" class="btn btn-danger"
                            data-bs-dismiss="modal">desasociar</button>
                        <button type="button" id="cerrar" class="btn btn-dark" data-bs-dismiss="modal"
                            wire:click.prevent="doClose()">Cerrar</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
