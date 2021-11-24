@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Auth::user()->type==='admin'||Auth::user()->id===$Usuario['id'])
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?= e($Usuario['name']) ?>
                    </div>
                    @if($Usuario['type']=='admin')
                        <div class="alert alert-warning">
                            Administrador
                        </div>
                    @endif
                    @if (Auth::user()->id===$Usuario['id']||Auth::user()->type==='admin')
                        <div class="panel-body">
                            <h1>Carrito de compra</h1>
                            @foreach ($Pedidos as $pedido)
                                @foreach ($Products as $product)
                                @if(($pedido->productid)==($product->id))
                                    <div class="card mb-3" style="max-width: 800px;">
                                        <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width: 24rem;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                            <a href="/product/{{ $product->id }}" class="card-title">{{ $product->name }}</a>
                                            <p class="card-text">Precio: ${{number_format($product->price,2) }}</p>
                                            <p class="card-text">Cantidad: {{ $pedido->cantidad }}</p>
                                            <p class="card-text">Total: ${{ number_format(($product->price)*($pedido->cantidad),2) }}</p>
                                            @if(($pedido->comprado))
                                            <p class="card-text">Fecha de compra: {{ $pedido->fechaCompra }}</p>
                                            @else
                                            <p class="card-text">Fecha de compra: <i>N/A</i></p>
                                            @endif
                                            <a href="/product/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a>
                                            </div>
                                        </div>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                @endif
                                @endforeach
                            @endforeach
                        </div>
                        {{ $Pedidos->links() }}
                    @else
                        <div class="panel-body">
                            No puedes ver los pedidos de este usuario
                        </div>
                    @endif
                </div>
            @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Acceso denegado
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            Por motivos de privacidad no puedes ver informacion de este usuario.
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
