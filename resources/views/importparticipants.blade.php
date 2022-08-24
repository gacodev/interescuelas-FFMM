@extends('layouts.app')
@section('content')

<div class="container col-10">
<div class="row d-flex justify-content-center align-content-center">
<div class="card col-6">
<h2 required class="text-center mt-2"><strong>Registro de Participantes</strong></h2>
<div class="card-body">  

<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Delegado</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Recuerde utilizar el formato establecido</div>
  </div>
  <div class="mb-3">
    <label for="file" class="form-label">Carga de Archivo</label>
    <input type="file" name="file" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="d-flex justify-content-center mb-2">
  <button type="submit" class="btn btn-primary ">Importar</button>
  </div>
</form>  
</div>
</div>
</div>
</div>
@endsection   