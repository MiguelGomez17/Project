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
                            <h1>Pedidos realizados</h1>
                            @foreach ($Pedidos as $pedido)
                                @foreach ($Products as $product)
                                @if(($pedido->productid)==($product->id))
                                    <div class="card mb-3" style="max-width: 800px;">
                                        <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 24rem;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                            <a href="/product/{{ $product->id }}" class="card-title">{{ $product->name }}</a>
                                            <p class="card-text">Precio: ${{ $product->price }}</p>
                                            <p class="card-text">A nombre: {{ $pedido->name }}</p>
                                            <p class="card-text">Direccion: {{ $pedido->direccion }}</p>
                                            @if(($pedido->entregado==false))
                                            <p class="card-text">Fecha de compra: {{ $pedido->fechapedido }}</p>
                                            <p class="card-text">Estado: En camino</p>
                                            @if(Auth::user()->type==='admin')
                                            <div class="alert alert-success">
                                                <a href="/entrega/{{ $pedido->id }}" class="card-text">Marcar como entregado</a>&nbsp;
                                            </div>
                                            @endif
                                            @else
                                            <p class="card-text">Fecha de entrega: {{$pedido->fechaentrega}}</p>
                                            <p class="card-text">Estado: Entregado</p>
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
