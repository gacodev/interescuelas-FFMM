@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

        <div class="col-sm-10 col-md-2 container text-center mb-3">
            <h1 class="text-center">Medallas</h1>
                            <div class="bg-warning card mt-2"><p class="mt-2 p-2">{{$gold}}</p></div>
                            <div class="card mt-2" style="background-color:#BEBEBE;"><p class="mt-2 p-2">{{$silver}}</p></div>
                            <div class="card mt-2" style="background-color:#CD7F32;"><p class="mt-2 p-2">{{$bronze}}</p></div>
                            <div class="bg-success card mt-2"><p class="mt-2 mb-2 p-2">{{$total}}</p></div>
        </div>
            <div class="col-md-10 text-center">
                <div class="card d-flex mb-4 border border-dark justify-content-center">
                    <div class="card-header text-center">
                        <h1> <strong> {{ __('Tabla de medalleria ') }} </strong></h1>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">

                                    <tr>
                                        <th>Deporte</th>
                                        <th>Oro</th>
                                        <th>Plata</th>
                                        <th>Bronce</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sports as $sport)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-left text-center">
                                                    <div class="m-2 align-items-center">
                                                        <img src="/{{$sport->sport_image}}"
                                                            alt="" style="width: 80px; height: 80px"
                                                            class="" />
                                                    </div class="">
                                                    <div>
                                                        <form action="/medalleria/{{ $sport->id }}" method="GET">
                                                            <!-- <input type="hidden" name="sportId" value="{{ $sport->id }}"> -->
                                                            <a id="item"
                                                                onclick='this.parentNode.submit(); return false;'><strong>{{ strtoupper($sport->sport) }}</strong></a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <div class="ms-3">
                                                <td>{{ $sport->gold_award }}</td>
                                                <td>{{ $sport->silver_award }}</td>
                                                <td>{{ $sport->bronze_award }}</td>
                                                <td>{{ $sport->total_award }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                @livewire('teamsawards')
                @livewire('multimedallist')
            </div>

        </div>


    </div>
@endsection
