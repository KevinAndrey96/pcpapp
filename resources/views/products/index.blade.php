@extends('layouts.dashboard')
@section('content')
<style>

</style>


<div class="card">
    <div class="card-header">
       Productos
    </div>

 <div class="card-body">
    <div class="row">
        <a class = "btn btn-info" href={{ url('/products/create/'.$list->id) }}>Crear producto</a>
    </div>   
    <div class="row d-flex justify-content-center">
      
    <table class="table table-bordered table-responsive justify-content-center" id="datatable" cellspacing="0">
    <thead class="thead-light">
        <tr>
             <th>Id</th>
             <th>Nombre</th>
             <th>Precio</th>
             <th>Modificar</th>

     </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>
                
                <a class="btn btn-warning" href="{{ url('/products/'.$product->id.'/edit') }}" style="margin:3px" >Editar</a>
                

                <form method="POST" action="{{ url('products/'.$product->id) }}" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    
                    <button class = "btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" style="margin:3px">Borrar</button>
                
                </form>

                
           
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>


@endsection