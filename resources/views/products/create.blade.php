@extends('layouts.dashboard')

@section('content')

@if(Session::has('message'))

 <div class="alert alert-success" role="alert">
      
      {{Session::get('message')}}
 
 </div>
   
@endif



<div class="card">
  <div class="card-header">
    Crear Producto
  </div>
  <div class="card-body">
  <form action="{{url('/products')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Nombre: </label>
      <input class="form-control" type="text" name="name" id="name">
    </div>
    <div class="form-group">
      <label for="price">Precio: </label>
      <input class="form-control" type="number" name="price" id="price">
    </div>
    <input type="hidden" name="list_id"  value="{{ $list->id }}">

    <input type="submit" class="btn btn-info" value="Crear">
   
    
  </form>
</div>
</div>
@endsection