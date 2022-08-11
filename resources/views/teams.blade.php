@extends('layouts.app')

@section('content')
<div class="container">
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
                
                        <div class="card border-dark mt-4 col-5 mx-4 d-inline-block" >
                            <div class="card-header text-center text-white" style="background-color:red">Fuerza</div>
                                <div class="card-body text-dark">
                            <h5 class="card-title text-center text-uppercase"><strong>futbol </strong></h5>
                            <img class="rounded"src="https://imgs.search.brave.com/eIMuOGJdc-UB8vOWiWFWTpt0dKbb1Ravfnj638DW-4w/rs:fit:770:420:1/g:ce/aHR0cHM6Ly9zMDMu/czNjLmVzL2ltYWcv/X3YwLzc3MHg0MjAv/ZS8wLzYvYmFsb24t/ZGUtZnV0Ym9sLmpw/Zw" width="200" height="120" alt="">
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


                 <div class="card border-dark  mt-4 col-5  mx-4 d-inline-block" >
                    <div class="card-header text-center text-white" style="background-color:red">Fuerza</div>
                         <div class="card-body text-dark">
                            <h5 class="card-title text-center text-uppercase"><strong>Baloncesto </strong></h5>
                            <img class="rounded"src="https://imgs.search.brave.com/vQCCdtiB3VXMyUFIuWDnoeb_-6NxtG6_V4U6tjgeWic/rs:fit:1200:675:1/g:ce/aHR0cHM6Ly9hczAx/LmVwaW1nLm5ldC9i/YWxvbmNlc3RvL2lt/YWdlbmVzLzIwMTkv/MDkvMDMvbXVuZGlh/bF9iYWxvbmNlc3Rv/LzE1Njc1NDIzNTJf/ODM5MTA5XzE1Njc1/NDI0MjBfbm90aWNp/YV9ub3JtYWwuanBn" width="200" height="120" alt="">
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
