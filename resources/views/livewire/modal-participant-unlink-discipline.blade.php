<div class="modal" tabindex="-1" class="modal fade @if ($show === true) show @endif" id="myExampleModal"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">
    <div class="modal-dialog" role="document">
        @if ($participant)
            <form action="/participant/desasociar" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Desasociar Disciplina</h5>
                        <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                            aria-label="close"></i>
                    </div>
                    <div class="modal-body">

                        <div>

                            <div class="d-inline-block w-40 mt-2">
                                <strong class="d-block">{{ $participant->name }}</strong>
                                <strong class="d-block"></strong>
                            </div>
                            <div class="mt-2">
                                @csrf
                                <input type="hidden" name="id" value="{{ $participant->id }}">
                                <select class="form-select" name="discipline" id="disciplines">
                                    @foreach ($participant->disciplineParticipants as $disciplineParticipant)
                                        @if (isset($disciplineParticipant->discipline->discipline))
                                            <option value="{{ $disciplineParticipant->discipline->id }}">
                                                {{ $disciplineParticipant->discipline->discipline }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="asignar"
                            onclick="return confirm('Esta seguro de desasociar esta disciplina?')"
                            class="btn btn-danger">Desasociar</button>
                        <button type="button" id="cerrar" class="btn btn-dark" data-bs-dismiss="modal"
                            wire:click.prevent="doClose()">Cerrar</button>
                    </div>
                </div>
            </form>

        @endif
    </div>
</div>
