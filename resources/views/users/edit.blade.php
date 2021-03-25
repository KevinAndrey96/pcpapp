@extends('layouts.dashboard')

@section('content')

<div class="card">
  <div class="card-header">
    Editar Usuario
  </div>
  <div class="card-body">
  <form action="{{url('/users/'.$user->id)}}" method="POST" enctype="multipart/form-data"> 
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="form-group">
      <label for="name">Nombre: </label>
      <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" ></input>
    </div>
    <div class="form-group">
      <label for="phone">Teléfono: </label>
      <input class="form-control" type="number"  name="phone" id="phone" value="{{$user->phone}}"></input>
    </div>
    <div class="form-group">
      <label for="email">Email: </label>
      <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}"></input>
    </div>
    <div class="form-group">
      <label for="country">País: </label>
      <select name="country">

        <option value="Colombia" selected>Colombia</option>
        <option value="Peru">Perú</option>
        <option value="Mexico">Mexico</option>

      </select>
    </div>
    <div class="form-group">
      <label for="city">Ciudad: </label>
      <input class="form-control" type="text" name="city" id="city" value="{{$user->city}}"></input>
    </div>
    <div class="form-group">
      <label for="role">Rol: </label>
      <select name="role">

        <option value="Administrador" selected>Administrador</option>
        <option value="Distribuidor">Distribuidor</option>
        <option value="Ferretero">Ferretero</option>

      </select>
    </div>  
    <div class="form-group">
      <label for="image">Seleccione una foto: </label>
      <input class="form-control" type="file" name="image" id="image" value="">
    </div>
    <div class="form-group">
      <label for="establishment_name">Nombre del establecimiento: </label>
      <input class="form-control" type="text" name="establishment_name" id="establishment_name" value="{{$user->establishment_name}}"> 
    </div>
    
    <div class="form-group">
      <label for="password">Contraseña: </label>
      <input class="form-control" type="password" name="password" id="password">
    </div>
  
    <input class="btn btn-info" type="submit" value="Modificar">
  
  </form>
</div>
</div>
@endsection