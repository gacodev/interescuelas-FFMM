<div class="modal" tabindex="-1" class="modal fade @if ($show === true) show @endif" id="myExampleModal"
    style="display: @if ($show === true) block
         @else
                 none @endif;" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Escoja la medalla a asignar</h5>
                <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal" aria-label="close"></i>
            </div>
            @if ($participant)
                <form action="/scores" method="post">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <div class="col-8 col-md-8 col-lg-6 p-4">
                                <img class="img-card d-inline-block img-fluid img-thumbnail"
                                    src="{{ $participant->photo }}" alt="">
                                <img src="{{ $participant->nationality->flag_image }}" width="80" height="80"
                                    style="position: absolute; right: 1.5rem; " alt=""
                                    class="mt-2 d-inline-block">
                            </div>

                            <div class="d-inline-block w-40 mt-2">
                                <strong class="d-block">{{ $participant->name }}</strong>
                                <strong class="d-block">{{ $participant->sport }}</strong>
                                <strong class="d-block"></strong>
                            </div>
                            <div class="mt-2">

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
                                <select class="form-select mt-4" name="award" id="awards">
                                    <option value="1">oro</option>
                                    <option value="2">Plata</option>
                                    <option value="3">Bronce</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="asignar"
                            onclick="return confirm('Esta seguro de asignar esta medalla?')"
                            class="btn btn-primary">Asignar</button>
                        <button type="button" id="cerrar" class="btn btn-danger" data-bs-dismiss="modal"
                            wire:click.prevent="doClose()">Cerrar</button>
                    </div>
                </form>

            @endif
        </div>
    </div>
</div>
