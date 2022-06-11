@extends('layouts.app')
@section('content')

    <div required class="container">
       <div required class="row justify-content-center">
    <form required class="col-sm-9 justify-content-center">

    <div>
    <div required class="d-flex flex-row-reverse mb-2">
<a required class="btn btn-primary d-flex-inline"href="{{ route('participants.show') }}"> Ver Participantes</a>
</div>
    <h2 required class="text-center"><strong>XXVIII Juegos Inter escuelas de Cadetes 2022-Ejercito</strong></h2>
    <h2 required class="text-center"><strong>Registrar Staff</strong></h2>

    <div required class="form-group mt-2">
    <label>Fuerza</label>
    <select required class="form-control" >
      <option>1</option>
      <option>2</option>
    </select>
  </div>

  <div required class="form-group mt-2">
    <label>Grado</label>
    <select required class="form-control" >
      <option>1</option>
      <option>2</option>
    </select>
  </div>

  <div required class="form-group mt-3">
    <label>Nombre Completo</label>
    <input type="text" required class="form-control">
  </div>

  <div required class="form-group mt-3">
    <label>Numero de documento</label>
    <input type="number" required class="form-control">
  </div>

  <div required class="form-group mt-2">
    <label>Equipo al que pertenece</label>
    <select required class="form-control" >
      <option>1</option>
      <option>2</option>
    </select>
  </div>

 


 <div required class="form-group mt-2 text-center">
     <button type="submit" required class="btn btn-success col-sm-2 col-md-3 col-xs-2">
            Registrar
     </button>
 </div>
 </div>
</form>
</div>
</div> 
@endsection