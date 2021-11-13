@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Resultados</div>
                <div class="panel-body">
                    @if (!Auth::user())
                    <div class="alert alert-info">
                            <a href="{{ route('login') }}"><strong>Inicia sesion</strong></a> para realizar compras
                        </div>
                    @endif
                    <div class="container">
                        @if(count($resultados)<=0)
                        <h5 class="card-title">No se encontraron resultados</h5>
                        @else
                        @foreach ($resultados as $product)
                        @if($product->inventory>0)
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 18rem;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">Descripcion:{{ $product->description }}</p>
                                        <p class="card-text">Precio: ${{ $product->price }}</p>
                                        <p class="card-text">Existencias: {{ $product->inventory }}</p>
                                        <a href="/product/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a><br>
                                        <a href="/product/{{ $product->id }}" class="btn btn-primary">Ver mas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        @endif
                        @endforeach
                        @endif
                        {{ $resultados->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection