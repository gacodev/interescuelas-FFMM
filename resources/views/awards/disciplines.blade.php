@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="m-2 d-flex flex-row-reverse">
                <a href="/medalleria" class="btn btn-primary">Regresar</a>
            </div>
            <div class="card d-flex mb-4 border border-dark justify-content-center">
                <div class="card-header text-center">
                    <h1> <strong> {{ __('Disciplinas') }} </strong>
                    </h1>
                </div>
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">

                                <tr>
                                    <th>Disciplina</th>
                                    <th>Deporte</th>
                                    <th>Equipos</th>
                                    <th>Oro</th>
                                    <th>Plata</th>
                                    <th>Bronce</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($disciplines as $discipline)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-left text-center">
                                            <div class="m-2 align-items-center">
                                                <img src="http://www.eltiempo.com/files/image_640_428/files/crop/uploads/2017/04/20/58f8da4442d5b.r_1492703844808.0-0-3000-1500.jpeg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                            </div class="">
                                            <div>
                                                <form action="/medalleria/sport/{{ $discipline->id }}" method="GET">
                                                    <a id="item" onclick='this.parentNode.submit(); return false;'>{{ $discipline->discipline }}</a>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <div class="ms-3">
                                        <td>{{ $discipline->sport->sport }}</td>
                                        <td>{{ $discipline->total_teams }}</td>
                                        <td>{{ $discipline->gold_award }}</td>
                                        <td>{{ $discipline->silver_award }}</td>
                                        <td>{{ $discipline->bronze_award }}</td>
                                        <td>{{ $discipline->total_award }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            @include('awards.multiMedalist')
        </div>
    </div>


</div>
@endsection