<div class="card mt-4 mb-4 d-flex border border-dark justify-content-center">
    <div class="card-header text-center">
        <h1> <strong> {{ __('Multimedallistas') }} </strong></h1>
    </div>
    <div class="card-body">

        <div>

        </div>

        <div class="row d-flex justify-content-center">
            @foreach ($participants as $participant)
                <div class="col-12 col-md-6 col-lg-4 p-2">
                    <div class="card border-dark">
                        <div class="card-header text-center text-white"
                            style="background-color:{{ $participant->force->color }}">
                            <strong>{{ $participant->force->force }}</strong>
                            <img src="{{ $participant->force->force_image }}" width="50" height="50" alt=""
                                class="d-inline">
                        </div>
                        <div class="card-body text-dark">

                            <div>
                                <div class="col-8 col-md-8 col-lg-6 p-4">
                                    <img class="img-card d-inline-block img-fluid img-thumbnail"
                                        src="/{{ $participant->photo }}" alt="">

                                    <img src="{{ $participant->nationality->flag_image }}" width="80" height="80"
                                        style="position: absolute; right: 1.5rem; " alt=""
                                        class="mt-2 d-inline-block">

                                </div>
                            </div>
                            <div class="">
                                <div class="mb-2 text-left">
                                    <p class="card-text lh-1 mt-2"><strong>Nacionalidad: </strong>
                                        {{ $participant->nationality->nationality }}</p>
                                    <p class="card-text lh-1"><strong>Nombre: </strong>{{ $participant->name }}
                                    </p>
                                    <p class="card-text lh-1"><strong>Medallas: </strong>
                                    </p>
                                </div>
                                @role('admin')
                                    <div class="text-center">
                                        <button type="button" class="m-1 btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#ver{{ $participant->id }}">Ver</button>
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
                </div>
            @endforeach
        </div>
    </div>

</div>
