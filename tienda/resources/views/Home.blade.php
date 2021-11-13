@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Pagina principal</div>
                <div class="panel-body">
                    @if (Auth::user())
                        <div class="alert alert-success">
                            Bienvenido {{ Auth::user()->name }}
                        </div>
                    @else
                    {{-- <div class="alert alert-info">
                        <a href="{{ route('login') }}"><strong>Inicia sesion</strong></a> para realizar compras
                    </div> --}}
                    @endif
                    <div class="container">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="text-aling: center; max-width: 95%; height: auto;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                            </ol>
                          
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="text-center">
                                        @if($bannerImages[0]->file)
                                        <img src="{{asset($bannerImages[0]->file)}}" class="img-fluid" alt="Error al cargar imagen">
                                        @else
                                        <img src="{{$defaultImage}}" class="img-fluid" alt="Error al cargar imagen">
                                        @endif
                                    </div>
                                </div>
                          
                                <div class="item">
                                    <div class="text-center">
                                        @if($bannerImages[0]->file)
                                        <img src="{{asset($bannerImages[0]->file1)}}" class="img-fluid" alt="Error al cargar imagen">
                                        @else
                                        <img src="{{$defaultImage}}" class="img-fluid" alt="Error al cargar imagen">
                                        @endif
                                    </div>
                                </div>
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
                                @if($product->inventory>0)
                                    <div class="col-sm-4">
                                        <div class="card" style="width: 22rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <div class="text-center" style="height: 22rem; width: auto;">
                                                    <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap" style="max-width: 18rem;">
                                                </div>
                                                {{-- <p class="card-text">{{ $product->description }}</p> --}}
                                                <p class="card-text">${{ $product->price }}</p>
                                                <a href="/product/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a><br>
                                                <a href="/product/{{ $product->id }}" class="btn btn-primary">Ver mas...</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{ $productsOferta->links() }}
                    </div>
                </div>
                <div class="panel-heading">Lo mas vendido</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($productsVendidos as $product)
                                @if($product->inventory>0)
                                    <div class="col-sm-4">
                                        <div class="card" style="width: 22rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <div class="text-center" style="height: 22rem; width: auto;">
                                                    <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap" style="max-width: 18rem;">
                                                </div>
                                                {{-- <p class="card-text">{{ $product->description }}</p> --}}
                                                <p class="card-text">${{ $product->price }}</p>
                                                <a href="/product/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a><br>
                                                <a href="/product/{{ $product->id }}" class="btn btn-primary">Ver mas...</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{ $productsVendidos->links() }}
                    </div>
                </div>
                <div class="panel-heading">Lo mas nuevo</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($productsNuevo as $product)
                                @if($product->inventory>0)
                                    <div class="col-sm-4">
                                        <div class="card" style="width: 22rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <div class="text-center" style="height: 22rem; width: auto;">
                                                    <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap" style="max-width: 18rem;">
                                                </div>
                                                <!--<p class="card-text">{{ $product->description }}</p>-->
                                                <p class="card-text">${{ $product->price }}</p>
                                                <a href="/product/category/{{ $product->category }}" class="card-text">{{ $product->category }}</a><br>
                                                <a href="/product/{{ $product->id }}" class="btn btn-primary">Ver mas...</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{ $productsNuevo->links() }}
                    </div>
                </div>
                {{-- <div class="panel-heading">Testimonios</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                </div>
            </div>
        </div>
    </div>
@endsection
