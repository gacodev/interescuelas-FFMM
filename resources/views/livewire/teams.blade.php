<div class="card-body">
    <div class="form-inline d-flex justify-content-center active-pink-2 mt-2 mb-3 col-6 m-auto">
        <input class="col-4 mr-2 form-control" type="text" name="busqueda" wire:model="search">
        <i class="bi bi-search p-2"></i>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            {{ Session::get('success') }}
        </div>
    @endif
         <div>
            <p><strong>EQUIPOS: </strong>{{$total}}</p>
        </div>
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($TeamParticipants as $team)
            <div class="card border-dark mt-4 col-xs-8 col-sm-10 col-md-5 col-lg-6 col-xl-5 mx-1">
                <div class="card-header text-center text-white" style="background-color:{{ $team->force->color }}">
                    {{ $team->force->force }}
                    <img src="{{ $team->force->force_image }}" width="50" height="50" alt=""
                        class="d-inline">
                </div>
                <div class="card-body text-dark">
                    <h5 class="card-title text-center text-uppercase">

                        <strong>{{ $team->name }}</strong> <br>{{ $team->sport->sport }}
                    </h5>
                    <img class="rounded"
                        src="/{{$team->sport->sport_image}}"
                        width="160" height="160" alt="">
                    <p>
                        Medalla:
                        @if (isset($team->award->award))
                            {{ $team->award->award }}
                        @else
                            N/A
                        @endif
                    </p>
                    <div class="table-responsive">
                        @if (isset($team->disciplineParticipants))
                            <table class="table">
                                <tr>

                                    <th class="lh-1">Nombre</th>
                                    @role('admin')
                                        <th class="lh-1">Identificacion</th>
                                        <th class="lh-1">Desasociar</th>
                                    @endrole


                                </tr>

                                @foreach ($team->disciplineParticipants as $disciplineParticipant)
                                    <tr>

                                        <td>{{ $disciplineParticipant->participant->name }}</td>

                                        @role('admin')
                                            <td>{{ $disciplineParticipant->participant->identification }}</td>
                                            <td><button type="button" class="m-1 btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#desasociar{{ $disciplineParticipant->participant->id }}">Desasociar</button>
                                            </td>
                                        @endrole

                                    </tr>

                                    <div class="modal" tabindex="-1"
                                        id="ver{{ $disciplineParticipant->participant->id }}" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"></h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="close">
                                                        <i class="w-20 bi bi-x-square close" type="button"
                                                            data-bs-dismiss="modal" aria-label="close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>

                                                        aqui ira el contenido del perfil del participante
                                                    </div>
                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" id="cerrar" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal" tabindex="-1"
                                        id="desasociar{{ $disciplineParticipant->participant->id }}" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"></h5>

                                                    <i class="w-20 bi bi-x-square close" type="button"
                                                        data-bs-dismiss="modal" aria-label="close"></i>

                                                </div>


                                                <div class="modal-body">
                                                    <form action="/equipos/desasociar" method="POST">
                                                        @csrf
                                                        <p>va a eliminar a
                                                            <strong>{{ $disciplineParticipant->participant->name }}</strong>
                                                            del equipo
                                                        </p>
                                                        <p>va a eliminar a
                                                            <strong>{{ $disciplineParticipant->participant_id }}</strong>
                                                            del equipo
                                                        </p>
                                                        <input type="hidden" name="discipline"
                                                            value="{{ $disciplineParticipant->discipline_id }}">
                                                        <input type="hidden" name="id"
                                                            value="{{ $disciplineParticipant->participant->id }}">
                                                        <input type="hidden" name="team"
                                                            value="{{ $disciplineParticipant->team_id }}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id="desasociar" class="btn btn-danger"
                                                        data-bs-dismiss="modal">desasociar</button>
                                                    <button type="button" id="cerrar" class="btn btn-dark"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </table>
                        @endif
                    </div>
                    @role('admin')
                        <div class="text-center d-flex flex-nowrap">


                            <button type="button" data-bs-toggle="modal" class="btn btn-primary"
                                wire:click.prevent="$emit('showModalAddAwardTeam', {{ $team->id }})">Agregar
                                Medallas
                            </button>


                            <button type="button" data-bs-toggle="modal" class="btn btn-danger"
                                wire:click.prevent="$emit('showModalRemoveAwardTeam', {{ $team->id }})">Eliminar
                                Medallas
                            </button>
                            <button type="button" data-bs-toggle="modal" class="btn btn-warning"
                                wire:click.prevent="$emit('showModalTeamAssign', {{ $team->id }})">Asociar
                                participante
                        </button>
                        <form action="/equipos/{{ $team->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                               Eliminar equipo
                            </button>
                        </form>
                        </div>
                    @endrole
                </div>
            </div>
        @endforeach

    </div>

    @livewire('modal-add-award-team')
    @livewire('modal-remove-award-team')
    @livewire('assign-team-modal')


    <div class="col-md-12
                                d-flex justify-content-center mt-2 p-3">
        <span class="p-2">{!! $TeamParticipants->links() !!}</span>
    </div>
</div>
