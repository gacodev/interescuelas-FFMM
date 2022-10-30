<div class="modal" tabindex="-1" class="modal fade @if ($show === true) show @endif"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">
    @if ($team)
        <form action="/equipos/eliminar/{{ $team->id }}" method="POST">
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
                            <input type="hidden" name="team_id" id="team_id" value="{{ $team->id }}">
                            <p class="text-center">va a eliminar la medalla del equipo
                                <strong>{{ $team->name }}</strong> asegurese de que es el equipo correcto
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="eliminar" class="btn btn-danger">eliminar</button>
                        <button type="button" id="cerrar" class="btn btn-dark" data-bs-dismiss="modal"
                            wire:click.prevent="doClose()">Cerrar</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
