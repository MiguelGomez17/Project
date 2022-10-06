@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user())
                @if(Auth::user()->type=='admin')
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Editar producto {{$Product->brand}}</h4>
                        </div>
                        <div class="container">
                            <form class="form-horizontal" autocomplete="off" method="POST" action="/edit/{{$Product->id}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-2 control-label">Descripcion</label>
                                    <div class="col-md-8">
                                        <input id="description" type="text" class="form-control" name="description" value="{{ $Product->description }}" placeholder="Ejemplo: Memoria RAM 1GB, Almacenmaiento: 8GB" autofocus autocomplete="off">
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price" class="col-md-2 control-label">Precio</label>
                                    <div class="col-md-8">
                                        <input id="price" type="number" class="form-control" name="price" value="{{ $Product->price }}" placeholder="{{ $Product->price }}" autofocus autocomplete="off">
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                    <label for="brand" class="col-md-2 control-label">Clave</label>
                                    <div class="col-md-8">
                                        <input id="brand" type="text" class="form-control" name="brand" value="{{ $Product->brand }}" placeholder="" autofocus autocomplete="off">
                                        @if ($errors->has('brand'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('brand') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image" class="col-md-2 control-label">Imagen</label>
                                    <div class="col-md-8">
                                        <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" accept="image">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('inventory') ? ' has-error' : '' }}">
                                    <label for="inventory" class="col-md-2 control-label">Existencias</label>
                                    <div class="col-md-8">
                                        <input id="inventory" type="number" class="form-control" name="inventory" value="{{ $Product->inventory }}" placeholder="Ejemplo: 50" autofocus autocomplete="off">
                                        @if ($errors->has('inventory'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('inventory') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                    <label for="category" class="col-md-2 control-label">Categoria</label>
                                    <div class="col-md-8">
                                        <input id="category" type="text" class="form-control" name="category" value="{{ $Product->category }}" placeholder="Ejemplo: Celular" autofocus autocomplete="off">
                                        @if ($errors->has('category'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Acceso denegado
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            No tienes autorizacion para ver esta pagina.
                            <?=redirect()->route('home');?> 
                        </div>
                    </div>
                </div>
                @endif
            @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Acceso denegado
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            No tienes autorizacion para ver esta pagina.
                            <?=redirect()->route('home');?> 
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection