@extends('layouts.navbar')
@section('title','Login')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">
                Controls Types
            </h5>
        <form class="">
            <div class="position-relative form-group">
                <label for="exampleEmail" class="">Correo electronico</label>
                <input name="email" id="exampleEmail" placeholder="Ingrese su correo electronico" type="email" class="form-control">
            </div>
            <div class="position-relative form-group">
                <label for="examplePassword" class="">Contraseña</label>
                <input name="password" id="examplePassword" placeholder="Ingrese su contraseña" type="password" class="form-control">
            </div>
            <p>¿No tienes cuenta? <a href="/users/register">Registrate</a></p>
            <button class="mt-1 btn btn-primary">Iniciar sesion</button>
            </form>
        </div>
    </div>
@endsection