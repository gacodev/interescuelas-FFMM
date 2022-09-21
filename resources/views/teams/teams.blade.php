@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center mb-4">
            <div class="card mb-4">
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
                

                      



                        <div class="modal" tabindex="-1" id="asignar" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <div class="modal-body">
                    <form action="">
                         <div>
                                <label for="awars">Escoja la medalla a asignar</label> 
                                <select class="form-select" name="awars" id="awars">
                                    <option value="1">oro</option>
                                    <option value="2">Plata</option>
                                    <option value="3">Bronce</option>
                                </select>
                        </div>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="asignar" class="btn btn-primary">Asignar</button>
                        <button type="button" id="cerrar" class="btn btn-danger"
                        data-bs-dismiss="modal">Cerrar</button>
                        </form>
                        </div>
                        </div>
                    </div>
            </div>


            <div class="col-md-12 d-flex justify-content-center mt-2 p-3">
                <span class="p-2">{!! $TeamParticipants->links('pagination::bootstrap-4') !!}</span>
            </div>


            <div class="modal" tabindex="-1" id="ver" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <div class="modal-body">
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cerrar" class="btn btn-danger"
                        data-bs-dismiss="modal">Cerrar</button>
                        </form>
                        </div>
                        </div>
                    </div>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
