@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Administracion
                </div>
                <div class="panel-body">
                    <div class="container">
                        <h4>Productos</h4>
                        <a href="/products/create" class="btn btn-success">Agregar producto</a>
                        <a href="/products/import" class="btn btn-success">Importar productos desde CSV</a>
                        <table class="table" style="width: 80%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Existencias</th>
                                    <th scope="col">Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Products as $Product)
                                    <tr>
                                        <th scope="row">{{$Product->id}}</th>
                                        <td><a href="/product/{{ $Product->id }}">{{$Product->name}}</a> </td>
                                        <td>{{$Product->price}}</td>
                                        <td>{{$Product->brand}}</td>
                                        <td>{{$Product->inventory}}</td>
                                        <td>{{$Product->category}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $Products->links() }}
                        <h4>Usuarios</h4>
                        <table class="table" style="width: 80%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo Electronico</th>
                                    <th scope="col">Tipo de usuario</th>
                                    <th scope="col">Nombrar / Quitar administrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Users as $User)
                                    <tr>
                                        <th scope="row">{{$User->id}}</th>
                                        <td><a href="/Users/{{ $User->id }}">{{$User->name}}</a> </td>
                                        <td>{{$User->email}}</td>
                                        <td>{{$User->type}}</td>
                                        @if($User->id==Auth::User()->id)
                                            <td>No puedes cambiar tu propio rango </td>
                                        @else
                                            <td><a href="/admin/{{ $User->id }}">Cambiar rango</a> </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $Users->links() }}
                        <h4>Pedidos</h4>
                        <table class="table" style="width: 80%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha pedido</th>
                                    <th scope="col">Fecha entrega</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Pedidos as $Pedido)
                                <tr>
                                    <th scope="row">{{$Pedido->id}}</th>
                                    @foreach ($Productos as $Producto)
                                        @if($Producto->id==$Pedido->productid)
                                        <td><a href="/product/{{ $Producto->id }}">{{$Producto->name}}</a> </td>
                                        @endif
                                    @endforeach
                                    @foreach ($Usuarios as $Usuario)
                                        @if($Usuario->id==$Pedido->userid)
                                            <td><a href="/Users/{{ $Usuario->id }}">{{$Usuario->name}}</a> </td>
                                        @endif
                                    @endforeach
                                    <td>{{$Pedido->direccion}}</td>
                                    @if(($Pedido->entregado))
                                        <td>Entregado</td>
                                    @else
                                        <td>En camino</td>
                                    @endif
                                    <td>{{$Pedido->fechapedido}}</td>
                                    <td>{{$Pedido->fechaentrega}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $Pedidos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
