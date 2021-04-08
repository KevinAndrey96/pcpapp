@extends('layouts.dashboard')
@section('content')
<style>

</style>


@if(Session::has('message'))
<div class="alert alert-success" role="alert">
     {{ Session::get('message') }} 
</div>                                    

@endif


<div class="card">
    <div class="card-header">
       Listas de precios
    </div>
    <div class="card-body">
 <div class="row d-flex justify-content-center">
    <table class="table table-bordered table-responsive" style="" id="datatable" width="100%" cellspacing="0">
        <thead class="thead-light">
            <tr>
                 <th>Id</th>
                 <th>Nombre</th>
                 <th>País</th>
                 <th>Divisa</th>
                 <th>Rol</th>
                 <th>Editar/Eliminar</th>
         </tr>
        </thead>
        <tbody>
            @foreach($lists as $list)
            <tr>
                <td>{{$list->id}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->country}}</td>
                <td>{{$list->currency}}</td>
                <td>{{$list->role}}</td>

                <td>
                    
                    <a class="btn btn-warning form-control" href="{{ url('/lists/'.$list->id.'/edit') }}" style="margin:3px">Editar</a>
                    

                    <form method="POST" action="{{ url('lists/'.$list->id) }}" >
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        
                        <button class = "btn btn-danger form-control" type="submit" onclick="return confirm('¿Borrar?');" style="margin:3px">Borrar</button>
                    
                    </form>

                    <a href="{{url('/products/'.$list->id)}}" class = "btn btn-success form-control"  style="margin:3px">Ver productos</a>
                    
                    <a href="{{url('exportProducts/'.$list->id)}}" class = "btn btn-secondary form-control"  style="margin:3px">Exportar lista</a>

                    
                        <a href="#" class = "btn btn-secondary form-control"  style="margin:3px">Importar lista</a>

                        <div class="form-group">

                            <form action="{{ url('importProducts/'.$list->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <input class="form-control" type="file" name="list" id="list">
                                <input class="btn btn-sm btn-info form-control"type="submit" value="Importar" width="200px">

                            </form>


                        </div>
                  

                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>     
@endsection