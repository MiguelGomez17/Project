@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                </div>
                @if($Product->inventory>0||(Auth::user()&&Auth::user()->type=='admin'))
                <div class="container">
                    <div class="card mb-3" style="max-width: 800px;">
                        <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset($Product->image) }}" alt="{{ $Product->brand }}" style="max-width: 24rem;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h2 class="card-title">{{ $Product->description }}</h2>
                            <h4 class="card-text">{{ $Product->brand }}</h4>
                            <a href="/category/{{ $Product->category }}" class="card-text">{{ $Product->category }}</a><br>
                            <a href="https://m.me/Dicesa1?ref=Precios" target="_blank" class="btn btn-primary">
                                Pregunta por nuestros precios
                            </a>
                            @if(Auth::user())
                                @if($Product->inventory>0)
                                {{--<h3>Agregar a mi lista</h3>
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
                                                Agregar
                                            </button>
                                        </div>
                                    </div>
                                </form>--}}
                                @endif
                                @if(Auth::user()->type=='admin')
                                    <a href="/product/edit/{{ $Product->id }}" class="btn btn-success">Editar</a>
                                    <a href="/product/delete/{{ $Product->id }}" class="btn btn-danger">Eliminar</a>
                                @endif
                            @else
                                
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