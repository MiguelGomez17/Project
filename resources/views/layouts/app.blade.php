<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DICESA @yield('mytitle')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/269788d904.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="container">
                    <form method="get" action="/search">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                                <a href="/home">
                                    <img class="col-md-3 control-label" src="{{asset('images/Logo.jpg')}}" style="width: 100%; max-height: auto;">
                                </a>
                            </div>
                            <div class="col-md-6 mb-4">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input id="search" type="Text" class="form-control" name="search" placeholder="Buscar" autocomplete="off" required>
@if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
@endif
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <p><button type="submit" class="btn btn-success" name="submit">Buscar <i class="fas fa-search"></i></button></p>
                    </form>
                    <ul class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->
@guest
                            <li><a href="">¡Bienvenido!</a></li>
                        {{--<li><a href="{{ route('login') }}">Inicia sesion</a></li>
                            <li><a href="{{ route('register') }}">Registrate</a></li>--}}
@else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    ¡Bienvenido {{ strtok((Auth::user()->name), ' ')  }}! <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/Users/{{ Auth::user()->id }}">Mi perfil</a>
                                    </li>
@if(Helper::admin())
                                    <li>
                                        <a class="nav-link text-light" href="/admin">Administrar</a>
                                    </li>
@endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesion
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
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
@php( $category = \App\categories::all())
@foreach($category as $categoria)
@if($categoria->categoria != 000 && ($categoria->categoria == '100'||$categoria->categoria % 100 == 0))
@php($actual = $categoria->categoria)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ucwords(mb_strtolower($categoria->titulo))}}<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
@foreach($category as $categoria)
@if(($categoria->categoria > $actual) && ($categoria->categoria < $actual+100))
@if(Helper::hasProducts($categoria->categoria) != '[]')
                                <li><a href="/category/{{$categoria->categoria}}">{{$categoria->titulo}} </a></li>
@endif
@endif
@endforeach
                            </ul>
                        </li>
@elseif($categoria->categoria == 000)
                        <li class="">
                            <a href="/category/{{$categoria->categoria}}">
                                {{ucwords(strtolower($categoria->titulo))}}
                            </a>
                        </li>
@endif
@endforeach
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
                    <p class="text-center">
                        <a href="/home">
                            <img class="col-md-3 control-label" src="{{asset('images/Logo.jpg')}}" style="width: 95%; max-height: auto;">
                        </a>
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
                    <a href="/about" class="text-reset">Quienes somos</a>
                    </p>
                    <p>
                    <a href="/ubicacion" class="text-reset">Ubicacion</a>
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
                    <a href="https://www.facebook.com/dicesa1" class="text-reset" target="_blank">Facebook</a>
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
                    <p><i class="fas fa-envelope me-3"></i> <a href="mailto:dicesa1@hotmail.com">dicesa1@hotmail.com</a></p>
                    <p><i class="fas fa-phone me-3"></i> 618 812 07 50</p>
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
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
</body>
</html>
