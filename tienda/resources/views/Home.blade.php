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
                    <div class="alert alert-info">
                            <a href="{{ route('login') }}"><strong>Inicia sesion</strong></a> para realizar compras
                        </div>
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
                                <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%221200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%201200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17c5ce1ad3f%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17c5ce1ad3f%22%3E%3Crect%20width%3D%221200%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22500%22%20y%3D%22142.4%22%3E1200x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="img-fluid" alt="Los Angeles">
                              </div>
                          
                              <div class="item">
                                <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%221200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%201200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17c5ce1ad3f%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17c5ce1ad3f%22%3E%3Crect%20width%3D%221200%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22500%22%20y%3D%22142.4%22%3E1200x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="img-fluid" alt="Chicago">
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
                                        <div class="card" style="width: 24rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap" style="max-width: 18rem;">
                                                <p class="card-text">{{ $product->description }}</p>
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
                                        <div class="card" style="width: 24rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap" style="max-width: 18rem;">
                                                <p class="card-text">{{ $product->description }}</p>
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
                                        <div class="card" style="width: 24rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap" style="max-width: 18rem;">
                                                <p class="card-text">{{ $product->description }}</p>
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
                <div class="panel-heading">Testimonios</div>
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
                </div>
            </div>
        </div>
    </div>
@endsection
