@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card d-flex mb-4 border border-dark justify-content-center">
                    <div class="card-header text-center">
                        <h1> <strong> {{ __('Tabla de medalleria General') }} </strong></h1>
                    </div>
                    <div class="card-body">


                        <div>
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">

                                    <tr>
                                        <th>Deporte</th>
                                        <th>Masculina</th>
                                        <th>Femenina</th>
                                        <th>Equipos</th>
                                        <th>Oro</th>
                                        <th>Plata</th>
                                        <th>Bronce</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $participant)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-left text-center">
                                                    <div class="m-2 align-items-center">
                                                        <img src="http://www.eltiempo.com/files/image_640_428/files/crop/uploads/2017/04/20/58f8da4442d5b.r_1492703844808.0-0-3000-1500.jpeg"
                                                            alt="" style="width: 45px; height: 45px"
                                                            class="rounded-circle" />
                                                    </div class="">
                                                    <div>
                                                        <form action="/medalleria/{sport}">
                                                            <a id="sportId"
                                                                onclick='this.parentNode.submit(); return false;'>{{ $participant->name }}</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <div class="ms-3">
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                @livewire('multimedallist')
            </div>
        </div>


    </div>
@endsection
