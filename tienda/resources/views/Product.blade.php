@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1><?= e($Product['name']) ?></h1>
                </div>
                <div class="container">
                    <div class="card mb-3" style="max-width: 800px;">
                        <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $Product->image }}" alt="{{ $Product->name }}" style="max-width: 24rem;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">{{ $Product->name }}</h5>
                            <p class="card-text">Descripcion: {{ $Product->description }}</p>
                            <p class="card-text">Marca: {{ $Product->brand }}</p>
                            <p class="card-text">Precio: ${{ $Product->price }}</p>
                            <p class="card-text">Existencias: {{ $Product->inventory }}</p>
                            <a href="/product/category/{{ $Product->category }}" class="card-text">{{ $Product->category }}</a><br>
                            @if(Auth::user())
                                <a href="/buy/{{ $Product->id }}" class="btn btn-primary">Comprar</a>
                                @if(Auth::user()->type=='admin')
                                    <a href="/product/delete/{{ $Product->id }}" class="btn btn-danger">Eliminar</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-info">Inicia sesion para comprar</a>
                            @endif
                            </div>
                        </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>
</div>
@endsection