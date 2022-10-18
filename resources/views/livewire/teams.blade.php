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

    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($TeamParticipants as $team)
        <div class="card border-dark mt-4 col-xs-8 col-sm-10 col-md-5 col-lg-6 col-xl-5 mx-1">
            <div class="card-header text-center text-white" style="background-color:red">{{ $team->force->force }}
            </div>
            <div class="card-body text-dark">
                <h5 class="card-title text-center text-uppercase">
                    <strong>{{ $team->name }}</strong> <br>{{ $team->sport->sport }}
                </h5>
                <img class="rounded" src="https://imgs.search.brave.com/eIMuOGJdc-UB8vOWiWFWTpt0dKbb1Ravfnj638DW-4w/rs:fit:770:420:1/g:ce/aHR0cHM6Ly9zMDMu/czNjLmVzL2ltYWcv/X3YwLzc3MHg0MjAv/ZS8wLzYvYmFsb24t/ZGUtZnV0Ym9sLmpw/Zw" width="200" height="120" alt="">
                <div class="table-responsive">
                    @if (isset($team->disciplineParticipants))
                    <table class="table">
                        <tr>

                            <th class="lh-1">Identificacion</th>
                            <th class="lh-1">Nombre</th>
                            <th class="lh-1">Ver</th>
                            <th class="lh-1">Desasociar</th>

                        </tr>

                        @foreach ($team->disciplineParticipants as $disciplineParticipant)
                        <tr>
                            <td>{{ $disciplineParticipant->participant->identification }}</td>
                            <td>{{ $disciplineParticipant->participant->name }}</td>

                            <td><button type="button" class="m-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#ver{{ $disciplineParticipant->participant->id }}">Ver</button>
                            </td>
                            <td><button type="button" class="m-1 btn btn-danger" data-bs-toggle="modal" data-bs-target="#desasociar{{ $disciplineParticipant->participant->id }}">Desasociar</button>
                            </td>

                        </tr>

                        <div class="modal" tabindex="-1" id="ver{{ $disciplineParticipant->participant->id }}" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"></h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>

                                            aqui ira el contenido del perfil del participante
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" id="cerrar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal" tabindex="-1" id="desasociar{{ $disciplineParticipant->participant->id  }}" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"></h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <div class="modal-body">
                                        <form action="/equipos/desasociar" method="POST">
                                        @csrf
                                        <p>va a eliminar a <strong>{{ $disciplineParticipant->participant->name }}</strong> del equipo</p>
                                        <p>va a eliminar a <strong>{{ $disciplineParticipant->participant_id}}</strong> del equipo</p>
                                        <input type="hidden" name="discipline" value="{{ $disciplineParticipant->discipline_id}}">
                                        <input type="hidden" name="id" value="{{ $disciplineParticipant->participant->id}}">
                                        <input type="hidden" name="team" value="{{ $disciplineParticipant->team_id}}">

                                    </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="desasociar" class="btn btn-danger" data-bs-dismiss="modal">desasociar</button>
                                            <button type="button" id="cerrar" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
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
                <div class="text-center">

                    <button type="button" data-bs-toggle="modal" data-bs-target="#asociar" class="btn btn-primary">Asociar</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#asignar" class="btn btn-warning">Agregar Medallas</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#eliminar" class="btn btn-danger">Eliminar Medallas</button>
                </div>
                @endrole
            </div>
        </div>


        @endforeach

    </div>



    <div class="modal" tabindex="-1" id="asociar" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div>
                            <label for="awars">Escoja la medalla a asignar</label>
                            <select class="form-select" name="awars" id="awars">
                                <option value="1">oro</option>
                                <option value="2">Plata</option>
                                <option value="3">Bronce</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="asignar" class="btn btn-primary">Asignar</button>
                    <button type="button" id="cerrar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="asignar" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div>
                            <label for="awars">Escoja la medalla a asignar</label>
                            <select class="form-select" name="awars" id="awars">
                                <option value="1">oro</option>
                                <option value="2">Plata</option>
                                <option value="3">Bronce</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="asignar" class="btn btn-primary">Asignar</button>
                    <button type="button" id="cerrar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="eliminar" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div>
                            <label for="awars">Escoja la medalla a asignar</label>
                            <select class="form-select" name="awars" id="awars">
                                <option value="1">oro</option>
                                <option value="2">Plata</option>
                                <option value="3">Bronce</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="asignar" class="btn btn-primary">Asignar</button>
                    <button type="button" id="cerrar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
        <span class="p-2">{!! $TeamParticipants->links('pagination::bootstrap-4') !!}</span>
    </div>


