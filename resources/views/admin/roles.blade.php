@extends('layouts.app')
@section('content')
    <div required class="container">
        <div required class="row justify-content-center">
            <div class="col-sm-9 justify-content-center">
               <h1 class="text-center">Roles</h1> 
            <table class="table">
            <thead class="thead-dark">
                <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">Usuario</th>
                <th scope="col">Clave</th>
                <th scope="col">Rol</th>
                <th scope="col">Asignar Rol</th>

                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                <th scope="row">1</th>
                <td>UsuarioX</td>
                <td><input class="form-control" type="password"></td>
                <td><select class="form-select">
                    <option value="1">admin</option>
                    <option value="2">delegado</option>
                </select></td>
                <td><button class="btn btn-success">asignar</button></td>
                </tr>

                <tr class="text-center">
                <th scope="row">1</th>
                <td>UsuarioY</td>
                <td><input class="form-control" type="password"></td>
                <td><select class="form-select">
                    <option value="1">admin</option>
                    <option value="2">delegado</option>
                </select></td>
                <td><button class="btn btn-success">asignar</button></td>
                </tr>
            </tbody>
            </table>


        </div>
        </div>
    </div>

@endsection
