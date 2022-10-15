@extends('layouts.app')
@section('mytitle', '| Administracion')
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
                        <h4>Pagina principal</h4>
                        <a href="/custom" class="btn btn-success">Cambiar pagina principal</a>
                        <h4>Productos</h4>
                        <a href="/products/create" class="btn btn-success">Agregar producto</a>
                        <a href="/products/import" class="btn btn-success">Importar productos desde CSV</a>
                        <table class="table" style="width: 80%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Clave</th>
                                    <th scope="col">Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Products as $Product)
                                    <tr>
                                        <th scope="row">{{$Product->id}}</th>
                                        <td><a href="/product/{{ $Product->id }}">{{$Product->description}}</a> </td>
                                        <td>{{$Product->brand}}</td>
                                        <td><a href="/category/{{$Product->category}}">{{$Product->category}}</a></td>
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
                        <h4>Productos en Listas</h4>
                        <table class="table" style="width: 80%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Agregado el dia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Pedidos as $Pedido)
                                <tr>
                                    <th scope="row">{{$Pedido->id}}</th>
                                    @foreach ($Productos as $Producto)
                                        @if($Producto->brand==$Pedido->productid)
                                        <td><a href="/product/{{ $Producto->id }}">{{$Producto->description}}</a> </td>
                                        @endif
                                    @endforeach
                                    @foreach ($Usuarios as $Usuario)
                                        @if($Usuario->id==$Pedido->userid)
                                            <td><a href="/Users/{{ $Usuario->id }}">{{$Usuario->name}}</a> </td>
                                        @endif
                                    @endforeach
                                    <td>{{$Pedido->cantidad}}</td>
                                    <td>${{$Pedido->total}}</td>
                                    <td>{{$Pedido->created_at}}</td>
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
