@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1><?= e($Product['name']) ?></h1>
                </div>
                @if($Product->inventory>0||(Auth::user()&&Auth::user()->type=='admin'))
                <div class="container">
                    <div class="card mb-3" style="max-width: 800px;">
                        <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset($Product->image) }}" alt="{{ $Product->name }}" style="max-width: 24rem;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">{{ $Product->name }}</h5>
                            <p class="card-text">Descripcion: {{ $Product->description }}</p>
                            <p class="card-text">Marca: {{ $Product->brand }}</p>
                            <p class="card-text">Precio: ${{ number_format($Product->price,2) }}</p>
                            <p class="card-text">Existencias: {{ $Product->inventory }}</p>
                            <a href="/product/category/{{ $Product->category }}" class="card-text">{{ $Product->category }}</a><br>
                            @if(Auth::user())
                                @if($Product->inventory>0)
                                <h3>Agregar al carrito</h3>
                                <form class="form-horizontal" autocomplete="off" method="POST" action="/processAdd/{{$Product->id}}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                                        <label for="cantidad" class="col-md-2 control-label">Cantidad</label>
                                        <div class="col-md-8">
                                            <input id="cantidad" type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}" min="1" max="100" onkeyup="this.value = Math.round(this.value);">
                                            @if ($errors->has('cantidad'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <button type="submit" class="btn btn-primary">
                                                Agregar al carrito
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                                @if(Auth::user()->type=='admin')
                                    <a href="/product/edit/{{ $Product->id }}" class="btn btn-success">Editar</a>
                                    <a href="/product/delete/{{ $Product->id }}" class="btn btn-danger">Eliminar</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-info">Inicia sesion para comprar</a>
                            @endif
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