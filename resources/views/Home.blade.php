@extends('layouts.app')
@section('mytitle', '| Inicio')
@section('content')
<div class="container" style="width: 95%">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Pagina principal</div>
                <div class="panel-body">
                    <div class="alert alert-info">
                        Pregunta por nuestros precios en <a href="https://www.facebook.com/dicesa1" target="_blank"><strong>Facebook</strong></a><br>
                        <a href="/ubicacion"><strong>Acuda a la tienda</strong></a> para realizar compras.
                    </div>
                    <div class="container" style="max-width: 95%">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="text-aling: center;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @foreach($bannerImages as $banner)
                                    <li data-target="#myCarousel" data-slide-to="{{$loop->index}}"></li>
                                @endforeach
                            </ol>
                          
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach($bannerImages as $banner)
                                    @if($loop->index == 0)
                                    <div class="item active">
                                    @else
                                    <div class="item">
                                    @endif
                                        <div class="text-center">
                                            @if($banner->file != '')
                                            <img src="{{asset($banner->file)}}" class="img-fluid" width="100%" alt="Error al cargar imagen">
                                            @else
                                            <img src="{{$defaultImage}}" class="img-fluid" width="100%" alt="Error al cargar imagen">
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                          
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-heading">Ofertas</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($productsOferta as $product)
                                @php($Producto = DB::table('products')->where('brand','=',$product)->get())
                                @foreach($Producto as $Muestra)
                                <div class="col-sm-4">
                                        <div class="card border-dark" style="max-width: 22rem;">
                                            <div class="card-body">
                                                <a href="/product/{{ $Muestra->brand }}"><h5 class="card-title">{{ $Muestra->description }}</h5></a>
                                                <div class="text-center" style="height: 22rem; width: auto;">
                                                    <a href="/product/{{ $Muestra->brand }}"><img class="card-img-top" src="{{ $Muestra->image }}" alt="Card image cap" style="height: auto; max-width: 95%; max-height: 95%;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="panel-heading">Lo mas vendido</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($productsVendidos as $product)
                                @php($Producto = DB::table('products')->where('brand','=',$product)->get())
                                @foreach($Producto as $Muestra)
                                <div class="col-sm-4">
                                        <div class="card border-dark" style="max-width: 22rem;">
                                            <div class="card-body">
                                                <a href="/product/{{ $Muestra->brand }}"><h5 class="card-title">{{ $Muestra->description }}</h5></a>
                                                <div class="text-center" style="height: 22rem; width: auto;">
                                                    <a href="/product/{{ $Muestra->brand }}"><img class="card-img-top" src="{{ $Muestra->image }}" alt="Card image cap" style="height: auto; max-width: 95%; max-height: 95%;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="panel-heading">Lo mas nuevo</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($productsNuevo as $product)
                                @php($Producto = DB::table('products')->where('brand','=',$product)->get())
                                @foreach($Producto as $Muestra)
                                <div class="col-sm-4">
                                        <div class="card border-dark" style="max-width: 22rem;">
                                            <div class="card-body">
                                                <a href="/product/{{ $Muestra->brand }}"><h5 class="card-title">{{ $Muestra->description }}</h5></a>
                                                <div class="text-center" style="height: 22rem; width: auto;">
                                                    <a href="/product/{{ $Muestra->brand }}"><img class="card-img-top" src="{{ $Muestra->image }}" alt="Card image cap" style="height: auto; max-width: 95%; max-height: 95%;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--<div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <i>*Los precios mostrados son indicativos/aproximados y pueden cambiar en cualquier momento.</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-heading">Suscribete</div>
                <div class="panel-body">
                    <div class="container">
                        <form method="POST" action="">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">Ingresa tu correo para recibir noticias y promociones</label>

                                <div class="col-md-6" style="max-width: 95%;">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="No disponible" disabled required>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <p><button type="submit" disabled class="btn btn-success" name="submit"><i class="fa fa-check"></i>Enviar</button></p>
                        </form>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
