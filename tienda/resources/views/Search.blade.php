@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Resultados para <i>"{{ $Busqueda }}"</i></div>
                <div class="panel-body">
                    <div class="container" style="width: 95%">
                        @if(count($resultados)<=0)
                        <h5 class="card-title">No se encontraron resultados</h5>
                        @else
                            @foreach ($resultados as $product)
                                @if($product->inventory > 0)
                                    <div class="container">
                                        <div class="card mb-3" style="max-width: 800px;">
                                            <div class="row g-0">
                                                <div class="col-md-4 text-center">
                                                    <a href="/product/{{ $product->id }}"><img src="{{ $product->image }}" alt="{{ $product->brand }}" style="max-width: 18rem;"></a>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <a href="/product/{{ $product->id }}"><h2 class="card-title">{{ $product->description }}</h2></a>
                                                        <h4 class="card-text">{{ $product->brand }}</h4>
                                                        @if(strpos($product->category,','))
                                                            @php($categorias = explode(',',$product->category))
                                                            @foreach($categorias as $categoria)
                                                                @php($categoriaFinal = DB::table('categories')->where('categoria','=',$categoria)->get())
                                                                <a href="/category/{{ $categoria }}" class="card-text">{{ $categoriaFinal[0]->titulo }}</a><br>
                                                            @endforeach
                                                        @else
                                                            @php($categoriaFinal = DB::table('categories')->where('categoria','=',$product->category)->get())
                                                            <a href="/category/{{ $product->category }}" class="card-text">{{ $categoriaFinal[0]->titulo }}</a><br>
                                                        @endif
                                                        @if (Auth::user())
                                                            @if (Auth::user()->type=='admin')
                                                                <a href="/product/delete/{{ $product->id }}" class="btn btn-danger">Eliminar</a>
                                                                <a href="/product/edit/{{ $product->id }}" class="btn btn-success">Editar</a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                @endif
                            <hr>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection