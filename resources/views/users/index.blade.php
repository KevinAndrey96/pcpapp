@extends('layouts.dashboard')
@section('content')
<style>

</style>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Administradores</h1>
    
</div>

<div class="row">
    <table class="table table-bordered table-responsive" id="datatable" width="100%" cellspacing="0">
        <thead class="thead-light">
            <tr>
                 <th>Id</th>
                 <th>Nombre</th>
                 <th>Telefono</th>
                 <th>Email</th>
                 <th>Pais</th>
                 <th>Ciudad</th>
                 <th>Rol</th>
                 <th>Nombre del establecimiento</th>
                 <th>Editar/Eliminar</th>
         </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->phone}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->country}}</td>
                <td>{{$admin->city}}</td>
                <td>{{$admin->role}}</td>
                <td>{{$admin->establishment_name}}</td>
                <td>
                    
                    <a class="btn btn-warning" href="{{ url('/users/'.$admin->id.'/edit') }}">Editar</a>
                    

                    <form method="post" action="{{ url('/users/'.$admin->id) }}" >
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        
                        <button class = "btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                    
                    </form>
               
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>     
@endsection