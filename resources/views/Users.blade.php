@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Helper::admin()||Auth::user()->id===$Usuario['id'])
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?= e($Usuario['name']) ?>
                    </div>
                    @if($Usuario['type']=='admin')
                        <div class="alert alert-warning">
                            Administrador
                        </div>
                    @endif
                    @if (Auth::user()->id===$Usuario['id']||Helper::admin())
                        <div class="panel-body">
                            <h1>Lista de compra</h1>
                            {{--
                            @foreach ($Pedidos as $pedido)
                                @foreach ($Products as $product)
                                @if(($pedido->productid)==($product->brand))
                                    <div class="card mb-3" style="max-width: 800px;">
                                        <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->brand }}" style="max-width: 24rem;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                            <a href="/product/{{ $Product->brand }}" class="card-title"><h2>{{ $product->description }}</h2></a>
                                            <h3 class="card-text">Cantidad: {{ $pedido->cantidad }}</h3>
                                            @if(($pedido->comprado))
                                            <h3 class="card-text">Fecha de compra: {{ $pedido->fechaCompra }}</h3>
                                            @else
                                            <a href="/Remove/{{ $pedido->id }}" class="btn btn-danger">Remover</a>&nbsp;
                                            @endif
                                            <a href="/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a>
                                            </div>
                                        </div>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                @endif
                                @endforeach
                            @endforeach
                            --}}
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
