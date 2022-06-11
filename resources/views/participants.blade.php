@extends('layouts.app')
@section('content')

    <div required class="container">
       <div required class="row justify-content-center">
    <form required class="col-sm-9 justify-content-center">

    <div>
    <div required class="d-flex flex-row-reverse justify-content-center mb-2">
    <a required class="btn btn-primary m-1 d-flex-inline"href="{{ route('staff.index') }}"> Registrar Staff</a>        
    <a required class="btn btn-primary m-1 d-flex-inline"href="{{ route('participants.show') }}"> Ver Participantes</a>
    <a required class="btn btn-success m-1 d-flex-inline"href="{{ route('participants.show') }}"> Cargar en Excel</a>
</div>
    <h2 required class="text-center"><strong>XXVIII Juegos Inter escuelas de Cadetes 2022-Ejercito</strong></h2>
    <h2 required class="text-center"><strong>Registro de Participantes</strong></h2>

  
    <div required class="form-group mt-4">
    <label>Documento de identidad</label>
    <input type="number" required class="form-control">
  </div>

  <div required class="form-group mt-3">
    <label>Tipo de documento</label>
    <input type="text" required class="form-control">
  </div>

  <div required class="form-group mt-3">
    <label>Nombre Completo</label>
    <input type="text" required class="form-control">
  </div>


  <div required class="form-group mt-2">
    <label>Grupo Sanguineo</label>
    <select required class="form-control" >
      <option>1</option>
      <option>2</option>
    </select>
  </div>

  <div required class="form-group mt-3">
    <label>Estatura</label>
    <input type="number" required class="form-control">
  </div>

  <div required class="form-group mt-3">
    <label>Peso</label>
    <input type="number" required class="form-control">
  </div>

  <div required class="form-group mt-3">
    <p>Fotografía  Uniforme No.3 sin gorra fondo blanco (guardar archivo con nombre completo del deportista y sigla de la Escuela)</p>
    <label>Fotografia</label>
    <input type="number" required class="form-control">
  </div>
  

  <div required class="form-group mt-2">
    <label>Email</label>
    <input type="email" required class="form-control">
  </div>

  <div required class="form-group mt-3">
    <label>Fecha de nacimiento</label>
    <input type="date" required class="form-control">
  </div>

  
  <div required class="form-group mt-2">
    <label>Sexo</label>
    <select required class="form-control" >
      <option>1</option>
      <option>2</option>
    </select>
  </div>




  <div required class="form-group mt-2">
    <label>Disciplina Deportiva</label>
    <select required class="form-control" >
      <option>1</option>
      <option>2</option>
    </select>
  </div>

  <div required class="form-group mt-2">
    <label>Modalidades</label>
    <select required class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
    </select>
  </div>




 <div required class="form-group mt-2 text-center">
     <button type="submit" required class="btn btn-primary col-sm-2 col-md-3 col-xs-2">
            Registrar
     </button>
     <button type="submit" required class="btn btn-succes col-sm-2 col-md-3 col-xs-2">Descargar Formato</button>
 </div>
 </div>
</form>
</div>
</div> 
@endsection