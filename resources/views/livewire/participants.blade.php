<div class="card-body">
    <div class="col-12">
        @inject('carbon', 'Carbon\Carbon')
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

            @foreach ($participants as $participant)
                <div class="card border-dark my-2 mx-2 col-lg-3 col-md-4 col-xs-12 col-sm-4 col-xl-3 mw-100">
                    <div class="card-header text-center text-white" style="background-color:{{ $participant->color }}">
                        <strong>{{ $participant->force->force }}</strong>
                        <img src="{{ $participant->force->force_image }}" width="50" height="50" alt=""
                            class="d-inline">
                    </div>


                    <div class="card-body text-dark d-flex">
                        <div class="text-center">
                            <div>
                                <img class="img-card d-inline-block" src="{{ $participant->photo }}" alt=""
                                    width="120" height="80">
                                <img src="{{ $participant->nationality->flag_image }}" width="50" height="50"
                                    alt="" class="mt-2 d-inline-block">
                            </div>

                            <div class="d-flex mb-2 d-block justify-content-center container">
                                <div class="row d-flex">
                                    <p class="card-text m-2 col-12 d-flex justify-content-left lh-1"><strong
                                            class="mx-2 ">Nacionalidad: </strong>
                                        {{ $participant->nationality->nationality }}</p>
                                    <p class="card-text m-2 col-12 d-flex justify-content-left lh-1"><strong
                                            class="mx-2">Nombre: </strong>{{ $participant->name }}</p>
                                    <p class="card-text m-2 col-12 d-flex justify-content-left lh-1"><strong
                                            class="mx-2">Edad: </strong>
                                        {{ $carbon::parse($participant->birthday)->age }} años</p>
                                    <p class="card-text m-2 col-12 d-flex justify-content-left lh-1">
                                        @foreach ($participant->disciplineParticipants as $disciplineParticipant)
                                            <div class="card">
                                                <div class="card-header">
                                                    Disciplina: {{ $disciplineParticipant->discipline->discipline }}
                                                </div>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        <p>Deporte:
                                                            {{ $disciplineParticipant->discipline->sport->sport }}</p>


                                                        <footer class="blockquote mb-0">Medalla:
                                                            @if (isset($disciplineParticipant->award->award))
                                                                {{ $disciplineParticipant->award->award }}
                                                            @else
                                                                N/a
                                                            @endif
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            @role('admin')
                                <div class="d-flex mb-2 justify-content-center">
                                    <button type="button" class="m-1 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#ver{{ $participant->id }}">Ver</button>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#asignar{{ $participant->id }}" class="m-1 btn btn-warning">Agregar
                                        Medallas</button>
                                </div>
                            @endrole
                        </div>

                    </div>
                </div>


                <div class="modal" tabindex="-1" id="ver{{ $participant->id }}" role="dialog">
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

                                <button type="button" id="cerrar" class="btn btn-danger"
                                    data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" tabindex="-1" id="asignar{{ $participant->id }}" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Escoja la medalla a asignar</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div>
                                    <div class="d-inline-block w-40 mb-4">
                                        <img src="{{ $participant->photo }}" alt="" width="120"
                                            height="80">
                                    </div>
                                    <div class="d-inline-block w-40 mt-2">
                                        <strong class="d-block">{{ $participant->name }}</strong>
                                        <strong class="d-block">{{ $participant->sport }}</strong>
                                        <strong class="d-block"></strong>
                                    </div>
                                    <div class="mt-2">
                                        <form action="/scores" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $participant->id }}">
                                            <input type="hidden" name="discipline"
                                                value="{{ $participant->discipline_id }}">
                                            <select class="form-select" name="award" id="awards">
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
                                <button type="button" id="cerrar" class="btn btn-danger"
                                    data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
        <span class="p-2">{!! $participants->links('pagination::bootstrap-4') !!}</span>
    </div>
</div>
