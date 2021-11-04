<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DICES@ | Computación para todos</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/269788d904.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="container">
                    <form method="get" action="/search">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                            <a href="/home"><img class="col-md-3 control-label" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22180%22%20height%3D%2270%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%201200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17c5ce1ad3f%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17c5ce1ad3f%22%3E%3Crect%20width%3D%221200%22%20height%3D%22500%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22500%22%20y%3D%22142.4%22%3EDICESA%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt=""></a>
                            
                            <div class="col-md-6" style="max-width: 95%;">
                                <input id="search" type="Text" class="form-control" name="search" placeholder="Buscar" autocomplete="off" required>

                                @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <p><button type="submit" class="btn btn-success" name="submit"><i class="fas fa-search"></i></button></p>
                    </form>
                </div>
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                        DICES@
                    </a> --}}
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Computadoras<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Escritorio</a></li>
                                <li><a href="#">Laptop</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Hardware<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Discos duros</a></li>
                                <li><a href="#">Memorias</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Accesorios<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Audifonos</a></li>
                                <li><a href="#">Bocinas</a></li>
                            </ul>
                        </li>
                        <!--<li class="nav-item active">
                            <a class="nav-link text-light" href="/product">Productos
                            </a>
                        </li>-->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/Users/{{ Auth::user()->id }}">Mi perfil</a>
                                    </li>
                                    @if(Auth::user()->type=='admin')
                                    <li>
                                        <a class="nav-link text-light" href="/admin">Administrar</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            
        </nav>
        @yield('content')
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
                    
            <!-- Section: Links  -->
            <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>DICESA
                    </h6>
                    <p>
                    Computacion para todos
                    </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                    Sobre nosotros
                    </h6>
                    <p>
                    <a href="#!" class="text-reset">Quienes somos</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">Ubicacion</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">Garantia de compra</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">Atencion a cliente</a>
                    </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                    Redes sociales
                    </h6>
                    <p>
                    <a href="#!" class="text-reset">Facebook</a>
                    </p>
                    <p>
                    <a href="#!" class="text-reset">WhatsApp</a>
                    </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                    Contacto
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Av. 20 de Noviembre 117 Pte.<br>Casi esquina Progreso.<br>Durango, Dgo.</p>
                    <p>
                    <i class="fas fa-envelope me-3"></i>
                    dicesa1@hotmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> 812 07 50</p>
                </div>
                <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            </section>
            <!-- Section: Links  -->
        
        </footer>
        <!-- Footer -->
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
