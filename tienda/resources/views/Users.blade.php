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
                        <div class="panel-body">
                            Administrador
                        </div>
                    @endif
                    @if (Auth::user()->id===$Usuario['id'])
                        <div class="panel-body">
                            <h1>Pedidos realizados</h1>
                            @foreach ($Pedidos as $pedido)
                                @foreach ($Products as $product)
                                @if(($pedido->productid)==($product->id))
                                    <div class="card mb-3" style="max-width: 800px;">
                                        <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 18rem;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">Precio: ${{ $product->price }}</p>
                                            <p class="card-text">Frecha de compra: {{ $pedido->fechapedido }}</p>
                                            <a href="/product/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a><br>
                                            <a href="/product/{{ $product->id }}" class="btn btn-primary">Ver mas</a>
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
