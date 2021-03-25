@extends('layouts.dashboard')
@section('content')
<style>

</style>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Administradores</h1>
    
</div>

<div class="row">
    <table class="table table-bordered table-responsive" style="margin:auto;" id="datatable" width="100%" cellspacing="0">
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
                    
                    <a class="btn btn-warning" href="{{ url('/lists/'.$list->id.'/edit') }}">Editar</a>
                    

                    <form method="POST" action="{{ url('lists/'.$list->id) }}" >
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        
                        <button class = "btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                    
                    </form>

                    <a href="{{url('/products/'.$list->id) }}">Ver productos</a>
               
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>     
@endsection