@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user())
                @if(Auth::user()->type=='admin')
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>¿Realmente quiere eliminar este producto?</h3>
                            <h4>Esta accion no se puede deshacer</h4>
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
                                            <a href="/product/" class="btn btn-primary">No, mantener</a>
                                            @if(Auth::user())
                                                @if(Auth::user()->type=='admin')
                                                    <a href="/delete/{{ $Product->id }}" class="btn btn-danger">Si, eliminar</a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>                 
                @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Acceso denegado
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            No tienes autorizacion para ver esta pagina.
                            <?=redirect()->route('home');?> 
                        </div>
                    </div>
                </div>
                @endif
            @else
            <div class="panel panel-default">
                <div class="panel-heading">
                    Acceso denegado
                </div>
                <div class="panel-body">
                    <div class="alert alert-danger">
                        No tienes autorizacion para ver esta pagina.
                        <?=redirect()->route('home');?> 
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection