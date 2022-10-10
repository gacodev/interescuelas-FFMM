<div required class="container">
        <div required class="row justify-content-center rounded">
            <div class="col-sm-12 justify-content-center mb-2 table-responsive">
               <h1 class="text-center b">Editar Participantes</h1>
               <div class="col-12 mt-3">
                <form class="form-inline d-flex form-group justify-content-center md-form form-sm active-pink-2 mt-2 mb-3"
                action="{{route('participants.searchToEdit')}}" method="get">
                <input class="col-6 mr-2 text-center" type="text" placeholder="Encuentre el participante"
                    aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
                <button class="btn btn-primary ml-2">Buscar</button>
                </form>
                </div>
                <div class="table-responsive">
            <table class="table table-hover table-default border border-dark rounded-2">
            <thead class="table-dark">
                <tr class="text-center">
                <th scope="col">Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fotografia</th>
                <th scope="col">Tipo de sangre</th>
                <th scope="col">Peso</th>
                <th scope="col">Estatura</th>
                <th scope="col">Genero</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Disciplinas</th>
                <th scope="col">Equipo</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($participants as $participant)
                <tr class="text-center">
                <th>{{$participant->identification}}</th>
                <td>{{$participant->name}}</td>
                <td>{{$participant->phone}}</td>
                <td>{{$participant->photo}}</td>
                <td>{{$participant->blood_id}}</td>
                <td>{{$participant->weight}}</td>
                <td>{{$participant->height}}</td>
                <td>{{$participant->gender_id}}</td>
                <td>{{$participant->birthday}}</td>
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

                <td>{{$participant->team_id}}</td>
                @role('admin')
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#editar{{$participant->id}}">Editar</button>
                </td>
                @endrole
                </tr>
                <div class="modal" tabindex="-1" id="editar{{$participant->id}}" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center"><strong>Edicion de Datos</strong></h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <div class="modal-body">
                    <form action="/participantes/{{$participant->id}}" method = "POST">
                        @csrf
                        @method('PUT')
                            <strong class="d-inline-block">Documento</strong>
                            <input type="text" name ="identification" class="form-control" disabled value="{{$participant->identification}}">
                            <strong class="d-inline-block">Nombre</strong>
                            <input type="text" name ="name" class="form-control" value="{{$participant->name}}">
                            <strong class="d-inline-block">Telefono</strong>
                            <input type="text" name ="phone" class="form-control" value="{{$participant->phone}}">
                            <strong class="d-inline-block">Foto</strong>
                            <input type="file" name ="photo" class="form-control" value="{{$participant->photo}}">
                            <strong class="d-inline-block">Tipo de sangre</strong>
                            <input type="text" name ="blood_id" class="form-control" value="{{$participant->blood_id}}">
                            <strong class="d-inline-block">Peso</strong>
                            <input type="text" name="weight" class="form-control" value="{{$participant->weight}}">
                            <strong class="d-inline-block">Estatura</strong>
                            <input type="text" name ="height" class="form-control" value="{{$participant->height}}">
                            <strong class="d-inline-block">Genero</strong>
                            <input type="text" name ="gender_id" class="form-control" value="{{$participant->gender_id}}">
                            <strong class="d-inline-block">Fecha de Nacimiento</strong>
                            <input type="date" name ="birthday" class="form-control" value="{{$participant->birthday}}">
                            <strong class="d-inline-block">Disciplinas</strong>
                            <input type="text" name ="discipline_id" class="form-control" value="{{$participant->discipline_id}}">
                            <strong class="d-inline-block">Team</strong>
                            <input type="text" name ="team_id" class="form-control" value="{{$participant->team_id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                        <button type="button" id="cancelar" class="btn btn-danger"
                        data-bs-dismiss="modal">Cancelar</button>
                        </form>
                        </div>
                        </div>
                    </div>
             </div>




             <div class="modal" tabindex="-1" id="asociar{{$participant->id}}" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center"><strong>Edicion de Datos</strong></h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <div class="modal-body">
                <form action="/participantes/{{$participant->id}}" method = "POST">
                    @csrf
                    @method('PATCH')
                        <strong class="d-inline-block text-center">Lista de equipos</strong>
                        <select name="equipos" id="teams">
                            <option value="{{ 1 }}">futbol</option>
                            <option value="{{ 1 }}">baloncesto</option>
                            <option value="{{ 1 }}">esgrima</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                    <button type="button" id="cancelar" class="btn btn-danger"
                    data-bs-dismiss="modal">Cancelar</button>
                    </form>
                    </div>
                    </div>
                </div>
         </div>
            @endforeach
            </tbody>
            </table>
            </div>
        </div>


            @if(Session::has('success'))
                <div class="alert alert-success text-center">
                    {{Session::get('success')}}
                </div>
            @endif
        <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
                            <span class="p-2">{!! $participants->links('pagination::bootstrap-4') !!}</span>
               </div>
        </div>
    </div>
