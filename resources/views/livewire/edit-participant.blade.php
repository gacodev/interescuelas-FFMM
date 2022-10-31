<div required class="container">
    <div required class="row rounded">
        <div class="col-sm-12 justify-content-center mb-2 table-responsive">
            <div class="form-inline d-flex justify-content-center active-pink-2 mt-2 mb-3 col-6 m-auto">
                <input class="col-4 mr-2 form-control" type="text" name="busqueda" wire:model="search">
                <i class="bi bi-search p-2"></i>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-default border border-dark rounded-2">
                    <thead class="table-dark">
                        <tr class="text-right">
                            <th scope="col">Documento</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Fotografia</th>
                            <th scope="col">RH</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Estatura</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th colspan="2" scope="col" class="justify-content-center">Disciplinas</th>
                            @role('admin')
                                <th scope="col">Modificar</th>
                                <th colspan="2" scope="col">Disciplinas</th>
                            @endrole

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participants as $participant)
                            <tr class="text-center">
                                <th>{{ $participant->identification }}</th>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->phone }}</td>
                                <td>{{ $participant->photo }}</td>
                                <td>{{ isset($participant->blood) ? $participant->blood->type : '' }}</td>
                                <td>{{ $participant->weight }}</td>
                                <td>{{ $participant->height }}</td>
                                <td>{{ isset($participant->gender) ? $participant->gender->sexo : '' }}</td>
                                <td>{{ $participant->birthday }}</td>
                                @foreach ($participant->disciplineParticipants as $disciplineParticipant)
                                    <td class="d-inline-flex">
                                        <div class="card p-0 m-0">
                                            <div class="card-body p-0 m-0">
                                                <strong>Deporte:</strong>
                                                <p class="d-inline-block">
                                                    {{ $disciplineParticipant->discipline->sport->sport }}</p><br>
                                                <strong>Disciplina:</strong>
                                                <p class="d-inline-block">
                                                    {{ $disciplineParticipant->discipline->discipline }}</p>
                                            </div>
                                        </div>
                                    </td>
                                @endforeach
                                @role('admin')
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editar{{ $participant->id }}"
                                            wire:click.prevent="$emit('showModalEditParticipant', {{ $participant->id }})">Editar</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#asociar{{ $participant->id }}"
                                            wire:click.prevent="$emit('showModalParticipantLinkDiscipline', {{ $participant->id }})">Asociar</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#desasociar{{ $participant->id }}"
                                            wire:click.prevent="$emit('showModalParticipantUnlinkDiscipline', {{ $participant->id }})">Desasociar</button>
                                    </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @livewire('modal-edit-participant')
        @livewire('modal-participant-unlink-discipline')
        @livewire('modal-participant-link-discipline')

        <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
            <span class="p-2">{!! $participants->links() !!}</span>
        </div>
    </div>
</div>
