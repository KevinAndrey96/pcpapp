@extends('layouts.dashboard')

@section('content')

@if(Session::has('message'))

 <div class="alert alert-success" role="alert">
      
      {{Session::get('message')}}
 
 </div>
   
@endif



<div class="card">
  <div class="card-header">
    Crear Lista para {{ $role }}
  </div>
  <div class="card-body">
  <form action="{{url('/lists')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Nombre: </label>
      <input class="form-control" type="text" name="name" id="name">
    </div>
    <div class="form-group">
      <label for="currency">Divisa: </label>
      <select name="currency">

        <option value="USD" selected>USD</option>
        <option value="COP">COP</option>
        <option value="MXN">MXN</option>
        <option value="PEN">PEN</option>

      </select>
    </div>
  
    <div class="form-group">
      <label for="country">País: </label>
      <select name="country">

        <option value="Colombia" selected>Colombia</option>
        <option value="Peru">Perú</option>
        <option value="Mexico">Mexico</option>

      </select>
    </div>
    <input type="hidden" name="role"  value="{{ $role }}" >

    <input type="submit" class="btn btn-info" value="Crear">
   
    
  </form>
</div>
</div>
@endsection