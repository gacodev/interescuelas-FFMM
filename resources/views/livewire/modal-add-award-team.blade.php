<div class="modal" tabindex="-1" class="modal fade @if ($show === true) show @endif"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">
    @if ($team)
        <form action="/equipos/asignar/{{ $team->id }}" method="POST">
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
                            <label for="awars">Escoja la medalla a asignar</label>
                            <select class="form-select" name="award_id" id="award_id">
                                <option value="1">oro</option>
                                <option value="2">Plata</option>
                                <option value="3">Bronce</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="asignar" class="btn btn-primary">Asignar</button>
                        <button type="button" id="cerrar" class="btn btn-danger"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
