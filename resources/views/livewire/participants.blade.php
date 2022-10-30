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

        <div>
        <p><strong>PARTICIPANTES: </strong>{{$total}}</p>
        </div>
        <div class="row">

            @foreach ($participants as $participant)
                <div class="col-12 col-md-6 col-lg-4 p-2">
                    <div class="card border-dark">
                        <div class="card-header text-center text-white"
                            style="background-color:{{ $participant->force->color }}">
                            <strong>{{ $participant->force->force }}</strong>
                            <img src="{{ $participant->force->force_image }}" width="50" height="50"
                                alt="" class="d-inline">

                        </div>


                        <div class="card-body text-dark d-flex">
                            <div class="text-center">
                                <div class="col-8 col-md-8 col-lg-6 p-4">
                                    <img class="img-card d-inline-block img-fluid img-thumbnail"
                                        src="{{ $participant->photo }}" alt="">

                                    <img src="{{ $participant->nationality->flag_image }}" width="80" height="80"
                                        style="position: absolute; right: 1.5rem; " alt=""
                                        class="mt-2 d-inline-block">

                                </div>

                                <div class="d-flex mb-2 d-block justify-content-center container">
                                    <div class="row d-flex">
                                        <div class="mr-2">
                                            <p
                                                class="card-text m-2 col-12 d-flex justify-content-left lh-1 text-uppercase">
                                                <strong class="mx-2 ">Nacionalidad: </strong>
                                                {{ $participant->nationality->nationality }}
                                            </p>
                                            <p
                                                class="card-text m-2 col-12 d-flex justify-content-left lh-1 text-uppercase">
                                                <strong class="mx-2">Nombre: </strong>{{ $participant->name }}
                                            </p>
                                            <p
                                                class="card-text m-2 col-12 d-flex justify-content-left lh-1 text-uppercase">
                                                <strong class="mx-2">Edad: </strong>
                                                {{ $carbon::parse($participant->birthday)->age }} años
                                            </p>
                                        </div>
                                        @foreach ($participant->disciplineParticipants as $disciplineParticipant)
                                            <div class="card mb-2 border-dark">
                                                <div class="card-header">
                                                    <strong>
                                                        @if (isset($disciplineParticipant->discipline->sport->sport))
                                                            {{ $disciplineParticipant->discipline->sport->sport }}
                                                        @endif
                                                    </strong>
                                                </div>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        Disciplina:
                                                        @if (isset($disciplineParticipant->discipline->discipline))
                                                            {{ $disciplineParticipant->discipline->discipline }}
                                                        @endif
                                                        <footer class="blockquote mb-0">Medalla:
                                                            @if (isset($disciplineParticipant->award->award))
                                                                {{ $disciplineParticipant->award->award }}
                                                            @else
                                                                N/A
                                                            @endif
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                @can('/participantes/editar')
                                    <div class="d-flex mb-2 justify-content-center">
                                        <button type="button" class="m-1 btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#ver{{ $participant->id }}">Ver</button>
                                        <button type="button" class="m-1 btn btn-warning" type="button"
                                            wire:click.prevent="$emit('showModal', {{ $participant->id }})">Agregar
                                            Medallas</button>
                                        <button type="button" class="m-1 btn btn-danger" type="button"
                                            wire:click.prevent="$emit('showModalRemoveAward', {{ $participant->id }})">Eliminar
                                            Medallas</button>
                                    </div>
                                @endcan
                            </div>

                        </div>
                    </div>


                    <div class="modal" tabindex="-1" id="ver{{ $participant->id }}" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><strong>DATOS PERSONALES</strong></h5>
                                    <i class="w-20 bi bi-x-square close" type="button" data-bs-dismiss="modal"
                                        aria-label="close"></i>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                    <td><strong class="d-flex align-item-left">NOMBRE: </strong>
                                                        <p class="d-flex d-inline align-items-right">
                                                            {{ $participant->name }}</p>
                                                    <td>
                                                        </th>
                                                <tr>
                                                    <th scope="row">
                                                    <td><strong class="d-flex align-item-left">DOCUMENTO:</strong>
                                                        <p class="d-flex d-inline align-items-right">
                                                            {{ $participant->identification }}</p>
                                                    <td>
                                                        </th>
                                                <tr>
                                                    <th scope="row">
                                                    <td><strong class="d-flex align-item-left">NACIONALIDAD: </strong>
                                                        <p class="text-uppercase d-flex d-inline align-items-right">
                                                            {{ $participant->nationality->nationality }}
                                                    <td>
                                                        </th>
                                                <tr>
                                                    <th scope="row">
                                                    <td><strong class="d-flex align-item-left">FUERZA: </strong>
                                                        <p class="d-flex d-inline align-items-right">
                                                            {{ $participant->force->force }}</p>
                                                    <td>
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                    <td><strong class="d-flex align-item-left">TELEFONO: </strong>
                                                        <p class="d-flex d-inline align-items-right">
                                                            {{ $participant->phone }}</p>
                                                    <td>
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                    <td><strong class="d-flex align-item-left">DEPORTE: </strong>
                                                        <p class="d-flex d-inline align-items-right">
                                                            {{ $disciplineParticipant->discipline->sport->sport }}</p>
                                                    <td>
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                    <td><strong class="d-flex align-item-left">FECHA DE NACIMIENTO
                                                        </strong>
                                                        <p class="d-flex d-inline align-items-right">
                                                            {{ $participant->birthday }}</p>
                                                    <td>
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                    <td><strong class="d-flex align-item-left">GRADO </strong>
                                                        <p class="d-flex d-inline align-items-right">
                                                            {{ $participant->range_id }}</p>
                                                    <td>
                                                        </th>
                                                </tr>
                                            </tbody>
                                        </table>
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
        @livewire('modal-add-award')
        @livewire('modal-remove-award')
    </div>
    <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
        <span class="p-2">{!! $participants->links() !!}</span>
    </div>
</div>
