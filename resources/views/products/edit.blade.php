@extends('layouts.dashboard')

@section('content')

@if(Session::has('message'))

 <div class="alert alert-success" role="alert">
      
      {{Session::get('message')}}
 
 </div>
   
@endif



<div class="card">
  <div class="card-header">
    Editar 
  </div>
  <div class="card-body">
  <form action="{{url('/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="form-group">
      <label for="name">Nombre: </label>
      <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
    </div>
    <div class="form-group">
        <label for="price">Precio: </label>
        <input class="form-control" type="number" name="price" id="price" value="{{ $product->price }}">
      </div>

    <input type="submit" class="btn btn-info" value="Editar">
   
    
  </form>
</div>
</div>
@endsection