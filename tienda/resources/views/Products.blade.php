@extends('layouts.app')
@section('mytitle', '| Productos')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Productos</div>
                <div class="panel-body">
                    <div class="container">
                        @foreach ($products as $product)
                        @if($product->inventory>0)
                        <div class="containe">
                            <div class="card mb-3" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-4 text-center">
                                    <a href="/product/{{ $product->id }}"><img src="{{ $product->image }}" alt="{{ $product->brand }}" style="max-width: 18rem;"></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="/product/{{ $product->id }}"><h2 class="card-title">{{ $product->description }}</h2></a>
                                            <h4 class="card-text">{{ $product->brand }}</h4>
                                            <a href="/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a><br>
                                            @if (Auth::user())
                                            @if (Auth::user()->type=='admin')
                                            <a href="/product/delete/{{ $product->id }}" class="btn btn-danger">Eliminar</a>
                                            <a href="/product/edit/{{ $product->id }}" class="btn btn-success">Editar</a>
                                            @endif
                                            @endif
                                        </div>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
