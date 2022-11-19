@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                </div>
@if($Product->inventory>0||Helper::admin())
                <div class="container">
                    <div class="card mb-3" style="max-width: 75%;">
                        <div class="row g-0">
                        <div class="col-md-4 text-center">
                        <table style="height: 40%; width: 100%;">
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center">
                                        <img src="{{ asset($Product->image) }}" alt="{{ $Product->brand }}" style="max-width: 24rem; max-height: 24rem;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h2 class="card-title">{{ $Product->description }}</h2>
                            <h4 class="card-text">{{ $Product->brand }}</h4>
@if(strpos($Product->category,','))
@php($categorias = explode(',',$Product->category))
@foreach($categorias as $categoria)
@php($categoriaFinal = DB::table('categories')->where('categoria','=',$categoria)->get())
                            <a href="/category/{{ $categoria }}" class="card-text">{{ $categoriaFinal[0]->titulo }}</a><br>
@endforeach
@else
@php($categoriaFinal = DB::table('categories')->where('categoria','=',$Product->category)->get())
                            <a href="/category/{{ $Product->category }}" class="card-text">{{ $categoriaFinal[0]->titulo }}</a><br>
@endif
                            <a href="https://m.me/Dicesa1?ref=Precios" target="_blank" class="btn btn-primary">
                                Contactanos por messenger
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=" target="_blank" class="btn btn-success">
                                Contactanos por WhatsApp
                            </a>
@if(Helper::admin())
                                    <br>
                                    <h4>
                                        Opciones de administrador
                                    </h4>
                                    <a href="/product/edit/{{ $Product->brand }}" class="btn btn-success">Editar producto</a>
                                    <a href="/product/delete/{{ $Product->brand }}" class="btn btn-danger">Eliminar producto</a>
                            </div>
                        </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
@else
                    <div class="container">
                        <h4>Producto no disponible</h4>
                    </div>
@endif
            </div>
        </div>
    </div>
</div>
@endsection