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
                                        <th>Escuela</th>
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
                                                        <img src="http://www.eltiempo.com/files/image_640_428/files/crop/uploads/2017/04/20/58f8da4442d5b.r_1492703844808.0-0-3000-1500.jpeg"
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
                                                <td>1</td>
                                                <td>{{ $participantByDiscipline->discipline->discipline }}</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>


                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
                                <span class="p-2">{!! $participants->links('pagination::bootstrap-4') !!}</span>
                            </div>
                        </div>
                    </div>
                </div>

                @include('awards.multiMedalist')
            </div>
        </div>


    </div>
@endsection
