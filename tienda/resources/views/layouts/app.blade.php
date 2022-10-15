<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DICES@ @yield('mytitle')</title>

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
                            <li><a href="{{ route('login') }}">Inicia sesion</a></li>
                            {{--<li><a href="{{ route('register') }}">Registrate</a></li>--}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Bienvenido {{ strtok((Auth::user()->name), ' ')  }}! <span class="caret"></span>
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

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="bg-info text-white">
                            <a href="{{ route('home') }}">Pagina Principal</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Computación<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/category/Computadoras">Computadoras</a></li>
                                <li><a href="/category/Laptop">Laptops</a></li>
                                <li><a href="/category/Celular">Celulares</a></li>
                                <li><a href="/category/Tablet">Tablets</a></li>
                                <li><a href="/category/Telefono">Telefonos</a></li>
                                <li><a href="/category/Sistema">Sistemas</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Hardware<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/category/Cable">Cables</a></li>
                                <li><a href="/category/Cpu">CPUs</a></li>
                                <li><a href="/category/Disco">Discos duros</a></li>
                                <li><a href="/category/Disipador">Disipador</a></li>
                                <li><a href="/category/Fuente">Fuentes</a></li>
                                <li><a href="/category/Gabinete">Gabinetes</a></li>
                                <li><a href="/category/Memoria">Memorias</a></li>
                                <li><a href="/category/Mother boards">Mother Boards</a></li>
                                <li><a href="/category/Procesador">Procesadores</a></li>
                                <li><a href="/category/Tarjeta">Tarjetas de video</a></li>
                                <li><a href="/category/Ventilador">Ventilador</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Accesorios<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/category/Audifonos">Audifonos</a></li>
                                <li><a href="/category/Antena">Antenas</a></li>
                                <li><a href="/category/Adaptador">Adaptadores</a></li>
                                <li><a href="/category/Bocinas">Bocinas</a></li>
                                <li><a href="/category/Bafle">Bafle</a></li>
                                <li><a href="/category/Barra Multicontactos">Barra Multicontactos</a></li>
                                <li><a href="/category/Cargador">Cargadores</a></li>
                                <li><a href="/category/Chip">Chips</a></li>
                                <li><a href="/category/Control">Controles</a></li>
                                <li><a href="/category/Cristal templado">Cristal templado</a></li>
                                <li><a href="/category/Eliminador">Eliminador</a></li>
                                <li><a href="/category/Extension">Extension</a></li>
                                <li><a href="/category/Extensor">Extensor</a></li>
                                <li><a href="/category/Funda">Fundas</a></li>
                                <li><a href="/category/Maletin">Maletines</a></li>
                                <li><a href="/category/Microfono">Microfonos</a></li>
                                <li><a href="/category/Mochila">Mochilas</a></li>
                                <li><a href="/category/Monitor">Monitor</a></li>
                                <li><a href="/category/Mouse">Mouse</a></li>
                                <li><a href="/category/Multifuncional">Multifuncional</a></li>
                                <li><a href="/category/Panel solar">Paneles solares</a></li>
                                <li><a href="/category/Pantalla">Pantallas</a></li>
                                <li><a href="/category/Soporte">Soportes</a></li>
                                <li><a href="/category/Switch">Switch</a></li>
                                <li><a href="/category/Tapete">Tapetes p/ mouse</a></li>
                                <li><a href="/category/Teclado">Teclados</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Electronica y Gadgets<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/category/Bascula">Bascula</a></li>
                                <li><a href="/category/Calculadora">Calculadora</a></li>
                                <li><a href="/category/Camara">Camara</a></li>
                                <li><a href="/category/Chromecast">Chromecast</a></li>
                                <li><a href="/category/Detector">Detector</a></li>
                                <li><a href="/category/Encendedor">Encendedor</a></li>
                                <li><a href="/category/Humidificador">Humidificador</a></li>
                                <li><a href="/category/Lector">Lectores</a></li>
                                <li><a href="/category/Presentador">Presentadores</a></li>
                                <li><a href="/category/Quemador">Quemadores</a></li>
                                <li><a href="/category/Receptor">Receptores</a></li>
                                <li><a href="/category/Regulador">Reguladores</a></li>
                                <li><a href="/category/Reproductor">Reproductores</a></li>
                                <li><a href="/category/Sintonizador">Sintonizadores</a></li>
                                <li><a href="/category/Smart">Smart</a></li>
                                <li><a href="/category/Transmisor">Transmisores</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Mantenimiento<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/category/Aire Comprimido">Aire Comprimido</a></li>
                                <li><a href="/category/Pasta termica">Pasta termica</a></li>
                                <li><a href="/category/Bateria">Baterias</a></li>
                                <li><a href="/category/Spray">Spray limpiador</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Otros<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/category/Careta">Careta</a></li>
                                <li><a href="/category/Cubrebocas">Cubrebocas</a></li>
                                <li><a href="/category/Gel">Gel Antibacterial</a></li>
                                <li><a href="/category/Desinfectante">Desinfectantes</a></li>
                                <li><a href="/category/Pulso">Pulso-oximetro</a></li>
                                <li><a href="/category/Termometro">Termometros</a></li>
                                <li><a href="/category/Toallas">Toallas Desinfectantes</a></li>
                                <li><a href="/category/Botella De Tinta">Botella De Tinta</a></li>
                                <li><a href="/category/Foco">Focos Leds</a></li>
                                <li><a href="/category/Folders">Folders</a></li>
                                <li><a href="/category/Lampara">Lamparas Led</a></li>
                                <li><a href="/category/Lentes">Lentes</a></li>
                                <li><a href="/category/Mini">Mini</a></li>
                                <li><a href="/category/Pila">Pilas</a></li>
                                <li><a href="/category/Rack">Racks</a></li>
                                <li><a href="/category/Rollo">Rollos de papel normal y termico</a></li>
                                <li><a href="/category/Silla">Sillas</a></li>
                                <li><a href="/category/Tira Led">Tiras Leds</a></li>
                                <li><a href="/category/Toner">Toners</a></li>
                                <li><a href="/category/Tripie">Tripies</a></li>
                                <li><a href="/category/Videoconsola">Videoconsolas</a></li>
                                <li><a href="/category/Undefined">Otros</a></li>
                            </ul>
                        </li>
                        <li class="bg-danger text-white">
                            <a href="/ZonaGamer">
                                ZONA GAMER
                            </a>
                        </li>
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
