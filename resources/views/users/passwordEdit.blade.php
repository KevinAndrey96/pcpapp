@extends('layouts.dashboard')

@section('content')

<div class="card">
  <div class="card-header">
   Cambiar contraseña
  </div>
  <div class="card-body">
  <form action="{{ url('/users/passwordUpda') }}" method="POST" enctype="multipart/form-data"> 
    {{csrf_field()}}
    <div class="form-group">
      <label for="oldPass">Digite la contraseña antigua: </label>
      <input class="form-control" type="password" name="oldPass" id="name" value="" >
    </div>
    <div class="form-group">
      <label for="name">Digite la nueva contraseña: </label>
      <input class="form-control" type="password" name="newPass1" id="name" value="" >
    </div>
    <div class="form-group">
      <label for="name">Digite otra vez la nueva contraseña: </label>
      <input class="form-control" type="password" name="newPass2" id="name" value="" >
    </div>
    
    <input class="form-control" type="hidden" name="id" id="name" value="{{$user->id}}" >

    <input class="btn btn-info" type="submit" value="Cambiar">

  
  </form>
</div>
</div>
@endsection