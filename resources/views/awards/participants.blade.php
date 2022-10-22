@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="m-2 d-flex flex-row-reverse">
                    <a href="/medalleria/" class="btn btn-primary">Regresar</a>
                </div>
                <div class="card d-flex mb-4 border border-dark justify-content-center">
                    <div class="card-header text-center">
                        <h1> <strong> {{ __('Participantes') }} </strong>
                        </h1>

                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">

                                    <tr>
                                        <th>Participante</th>
                                        <th>Fuerza</th>
                                        <th>Competencia</th>
                                        <th>Oro</th>
                                        <th>Plata</th>
                                        <th>Bronce</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantsByDiscipline as $participantByDiscipline)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-left text-center">
                                                    <div class="m-2 align-items-center">
                                                        <img src="https://www.pikpng.com/pngl/m/80-805068_my-profile-icon-blank-profile-picture-circle-clipart.png"
                                                            alt="" style="width: 45px; height: 45px"
                                                            class="rounded-circle" />
                                                    </div class="">
                                                    <div>

                                                        <a id="item" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#ver{{ $participantByDiscipline->participant->id }}">{{ strtoupper($participantByDiscipline->participant->name) }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <div class="ms-3">
                                                <td>{{ $participantByDiscipline->participant->force->force }}</td>
                                                <td>{{ $participantByDiscipline->discipline->discipline }}</td>
                                                <td>{{ $participantByDiscipline->participant->gold_award }}</td>
                                                <td>{{ $participantByDiscipline->participant->silver_award }}</td>
                                                <td>{{ $participantByDiscipline->participant->bronze_award }}</td>
                                                <td>{{ $participantByDiscipline->participant->total_award }}</td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if (isset($participantsByDiscipline[0]))
                    @livewire('multimedallist', ['discipline_id' => $participantsByDiscipline[0]->discipline->id])
                @endif



            </div>
        </div>


    </div>
@endsection
<script>

</script>
