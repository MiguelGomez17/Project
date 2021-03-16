@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Pagina principal</div>
                <div class="panel-body">
                    @if (Auth::user())
                        <div class="alert alert-success">
                            Bienvenido {{ Auth::user()->name }}
                        </div>
                    @else
                    <div class="alert alert-info">
                            <a href="{{ route('login') }}"><strong>Inicia sesion</strong></a> para realizar compras
                        </div>
                    @endif
                    <div class="container">
                        @foreach ($products as $product)
                            <div class="card mb-3" style="max-width: 800px;">
                                <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 18rem;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <p class="card-title">{{ $product->name }}</p>
                                    <p class="card-text">Descripcion: {{ $product->description }}</p>
                                    <p class="card-text">Precio: ${{ $product->price }}</p>
                                    <a href="/product/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a><br>
                                    <a href="/product/{{ $product->id }}" class="btn btn-primary">Ver mas</a>
                                    </div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
