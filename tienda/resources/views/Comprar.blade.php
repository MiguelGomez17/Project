@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()&&($Product->inventory>0))
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container">
                            <div class="card mb-3" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset($Product->image) }}" alt="{{ $Product->brand }}" style="max-width: 24rem;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $Product->description }}</h5>
                                            <p class="card-text">{{ $Product->brand }}</p>
                                            <p class="card-text">Precio: ${{ $Product->price }}</p>
                                            <a href="/category/{{ $Product->category }}" class="card-text">{{ $Product->category }}</a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <h4>Complete la siguiente informacion para agregar al carrito</h4>
                        <div class="container">
                            <form class="form-horizontal" autocomplete="off" method="POST" action="/processbuy/{{$Product->id}}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-2 control-label">Nombre completo</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ejemplo: Jose Juan Jimenez Rodriguez" autofocus autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('calle') ? ' has-error' : '' }}">
                                    <label for="calle" class="col-md-2 control-label">Calle</label>
                                    <div class="col-md-8">
                                        <input id="calle" type="text" class="form-control" name="calle" value="{{ old('calle') }}" placeholder="Ejemplo: Calle principal 2" autofocus autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                        @if ($errors->has('calle'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('calle') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                                    <label for="numero" class="col-md-2 control-label">Numero de casa</label>
                                    <div class="col-md-8">
                                        <input id="numero" type="number" class="form-control" name="numero" value="{{ old('numero') }}" placeholder="Ejemplo: 523" autofocus autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                        @if ($errors->has('numero'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('fraccionamiento') ? ' has-error' : '' }}">
                                    <label for="fraccionamiento" class="col-md-2 control-label">Fraccionamiento</label>
                                    <div class="col-md-8">
                                        <input id="fraccionamiento" type="text" class="form-control" name="fraccionamiento" value="{{ old('fraccionamiento') }}" placeholder="Ejemplo: Jimenez Rodriguez II" autofocus autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                        @if ($errors->has('fraccionamiento'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fraccionamiento') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
                                    <label for="ciudad" class="col-md-2 control-label">Ciudad</label>
                                    <div class="col-md-8">
                                        <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}" placeholder="Ejemplo: Durango, Dgo" autofocus autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                        @if ($errors->has('ciudad'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ciudad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
                                    <label for="pais" class="col-md-2 control-label">Pais</label>
                                    <div class="col-md-8">
                                        <input id="pais" type="text" class="form-control" name="pais" value="{{ old('pais') }}" placeholder="Ejemplo: Mexico" autofocus autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                        @if ($errors->has('pais'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pais') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                    <label for="zipcode" class="col-md-2 control-label">Codigo postal</label>
                                    <div class="col-md-8">
                                        <input id="zipcode" type="number" class="form-control" name="zipcode" value="{{ old('zipcode') }}" placeholder="Ejemplo: 34200"autofocus autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                        @if ($errors->has('zipcode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('zipcode') }}</strong>
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
                </div>   
            @else
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Producto no disponible</h4>
                </div>
            </div>  
            @endif
        </div>
    </div>
</div>
@endsection
