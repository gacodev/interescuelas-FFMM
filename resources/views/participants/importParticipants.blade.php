@extends('layouts.app')
@section('content')

<div class="container col-10">
<div class="row d-flex justify-content-center align-content-center">
<div class="card col-6">
<h2 required class="text-center mt-2"><strong>Registro de Participantes</strong></h2>
<div class="card-body">  
<form  method="post" action="{{route('import.excel')}}" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="file" class="form-label">Carga de Archivo</label>
    <input type="file" name="file" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="d-flex justify-content-center mb-2">
      <a href="formato.xlsx" class="btn btn-success col-sm-2 col-md-3 col-xs-2 m-2" download> Descargar Formato </a> 
      <button type="submit" class="btn btn-primary m-2">Importar</button>            
  </div>
              @if(Session::has('success'))
                      <div class="alert alert-success text-center">
                          {{Session::get('success')}}
                      </div>
              @endif
</form>  
</div>
</div>
</div>
</div>
@endsection   