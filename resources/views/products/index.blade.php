@extends('layouts.dashboard')
@section('content')
<style>

</style>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Administradores</h1>
    
</div>

<div class="row">
    <a href={{ url('/products/create/'.$list->id) }}>Crear producto</a>
</div>     
@endsection