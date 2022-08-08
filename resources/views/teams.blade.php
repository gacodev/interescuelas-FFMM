@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="card ">
                <div class="card-header text-center"><h1> <strong>{{ __('Listado de Equipos') }}</strong></h1></div>
                <div class="card-body">

                <div>
                <form class="form-inline d-flex justify-content-center md-form form-sm active-pink-2 mt-2 mb-3">
                <input class="col-6 mx-2" type="text" placeholder="Buscar"
                    aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
                <button class="btn btn-primary ml-2">Buscar</button>
                </form>  
                </div>
                        <div class="card border-dark d-inline-block mt-4" >
                            <div class="card-header text-center text-white" style="background-color:red">Fuerza</div>
                                <div class="card-body text-dark">
                            <h5 class="card-title text-center text-uppercase"><strong>futbol </strong></h5>
                                <div>
                                    <table class="table">
                                        <tr>
                                            <th>Grado</th>
                                            <th>identificacion</th>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                        </tr>
                                        <tr>
                                        <td>SP</td>
                                        <td>123456879</td>
                                        <td>Alfreds Futterkiste</td>
                                        <td>12345644879</td>
                                        </tr>
                                    </table>
                                </div>
                          </div>
                        </div>


                        <div class="card border-dark d-inline-block mt-4" style="max-width: 30rem;" >
                            <div class="card-header text-center text-white" style="background-color:red">Fuerza</div>
                                <div class="card-body text-dark">
                            <h5 class="card-title text-center text-uppercase"><strong>futbol </strong></h5>
                                <div>
                                    <table class="table">
                                        <tr>
                                            <th>Grado</th>
                                            <th>identificacion</th>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                        </tr>
                                        <tr>
                                        <td>SP</td>
                                        <td>123456879</td>
                                        <td>Alfreds Futterkiste</td>
                                        <td>12345644879</td>
                                        </tr>
                                    </table>
                                </div>
                          </div>
                        </div>


                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
