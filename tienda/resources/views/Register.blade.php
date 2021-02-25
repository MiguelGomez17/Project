@extends('layouts.navbar')
@section('title','Register')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">
            Crear usuario
        </h5>
    <form class="">
        <div class="position-relative form-group">
            <label for="exampleName" class="">Nombre</label>
            <input name="Name" id="exampleName" placeholder="Ingrese su nombre" type="text" class="form-control">
        </div>
        <div class="position-relative form-group">
            <label for="exampleEmail" class="">Correo electronico</label>
            <input name="email" id="exampleEmail" placeholder="Ingrese su correo electronico" type="email" class="form-control">
        </div>
        <div class="position-relative form-group">
            <label for="examplePassword" class="">Contraseña</label>
            <input name="password" id="examplePassword" placeholder="Ingrese su contraseña" type="password" class="form-control">
        </div>
        <div class="position-relative form-group">
            <label for="examplePassword" class="">Confirme su contraseña</label>
            <input name="password" id="examplePassword" placeholder="Confirme su contraseña" type="password" class="form-control">
        </div>
        <p>¿Ya tienes cuenta? <a href="/users/login">Inicia sesion</a></p>
        <button class="mt-1 btn btn-primary">Crear usuario</button>
        </form>
    </div>
</div>
@endsection