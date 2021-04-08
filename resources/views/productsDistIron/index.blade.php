@extends('layouts.dashboard')
@section('content')

<div class="card">
    <div class="card-header">
        
        Productos
    
    </div>


    <div class="card-body">
        <div class="row d-flex justify-content-center">

                <table class="table table-bordered table-responsive justify-content-center" id="datatable" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                
                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            
            </div>
        </div>
        </div>

@endsection