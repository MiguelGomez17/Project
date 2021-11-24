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
                            <a href="/home">
                                <img class="col-md-3 control-label" src="{{asset('images/Logo.jpg')}}" style="width: 20%; max-height: auto;">
                            </a>
                            
                            <div class="col-md-6" style="max-width: 50%;">
                                <input id="search" type="Text" class="form-control" name="search" placeholder="Buscar" autocomplete="off" required>

                                @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <p><button type="submit" class="btn btn-success" name="submit">Buscar <i class="fas fa-search"></i></button></p>
                    </form>
                    <ul class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Inicia sesion</a></li>
                            <li><a href="{{ route('register') }}">Registrate</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Bienvenido {{ Auth::user()->name }}! <span class="caret"></span>
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Computación<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/product/category/Computadoras">Computadoras</a></li>
                                <li><a href="/product/category/Laptop">Laptops</a></li>
                                <li><a href="/product/category/Celular">Celulares</a></li>
                                <li><a href="/product/category/Tablet">Tablets</a></li>
                                <li><a href="/product/category/Telefono">Telefonos</a></li>
                                <li><a href="/product/category/Sistema">Sistemas</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Hardware<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/product/category/Cable">Cables</a></li>
                                <li><a href="/product/category/Cpu">CPUs</a></li>
                                <li><a href="/product/category/Disco">Discos duros</a></li>
                                <li><a href="/product/category/Disipador">Disipador</a></li>
                                <li><a href="/product/category/Fuente">Fuentes</a></li>
                                <li><a href="/product/category/Gabinete">Gabinetes</a></li>
                                <li><a href="/product/category/Memoria">Memorias</a></li>
                                <li><a href="/product/category/Mother boards">Mother Boards</a></li>
                                <li><a href="/product/category/Procesador">Procesadores</a></li>
                                <li><a href="/product/category/Tarjeta">Tarjetas de video</a></li>
                                <li><a href="/product/category/Ventilador">Ventilador</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Accesorios<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/product/category/Audifonos">Audifonos</a></li>
                                <li><a href="/product/category/Antena">Antenas</a></li>
                                <li><a href="/product/category/Adaptador">Adaptadores</a></li>
                                <li><a href="/product/category/Bocinas">Bocinas</a></li>
                                <li><a href="/product/category/Bafle">Bafle</a></li>
                                <li><a href="/product/category/Barra Multicontactos">Barra Multicontactos</a></li>
                                <li><a href="/product/category/Cargador">Cargadores</a></li>
                                <li><a href="/product/category/Chip">Chips</a></li>
                                <li><a href="/product/category/Control">Controles</a></li>
                                <li><a href="/product/category/Cristal templado">Cristal templado</a></li>
                                <li><a href="/product/category/Eliminador">Eliminador</a></li>
                                <li><a href="/product/category/Extension">Extension</a></li>
                                <li><a href="/product/category/Extensor">Extensor</a></li>
                                <li><a href="/product/category/Funda">Fundas</a></li>
                                <li><a href="/product/category/Maletin">Maletines</a></li>
                                <li><a href="/product/category/Microfono">Microfonos</a></li>
                                <li><a href="/product/category/Mochila">Mochilas</a></li>
                                <li><a href="/product/category/Monitor">Monitor</a></li>
                                <li><a href="/product/category/Mouse">Mouse</a></li>
                                <li><a href="/product/category/Multifuncional">Multifuncional</a></li>
                                <li><a href="/product/category/Panel solar">Paneles solares</a></li>
                                <li><a href="/product/category/Pantalla">Pantallas</a></li>
                                <li><a href="/product/category/Soporte">Soportes</a></li>
                                <li><a href="/product/category/Switch">Switch</a></li>
                                <li><a href="/product/category/Tapete">Tapetes p/ mouse</a></li>
                                <li><a href="/product/category/Teclado">Teclados</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Electronica y Gadgets<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/product/category/Bascula">Bascula</a></li>
                                <li><a href="/product/category/Calculadora">Calculadora</a></li>
                                <li><a href="/product/category/Camara">Camara</a></li>
                                <li><a href="/product/category/Chromecast">Chromecast</a></li>
                                <li><a href="/product/category/Detector">Detector</a></li>
                                <li><a href="/product/category/Encendedor">Encendedor</a></li>
                                <li><a href="/product/category/Humidificador">Humidificador</a></li>
                                <li><a href="/product/category/Lector">Lectores</a></li>
                                <li><a href="/product/category/Presentador">Presentadores</a></li>
                                <li><a href="/product/category/Quemador">Quemadores</a></li>
                                <li><a href="/product/category/Receptor">Receptores</a></li>
                                <li><a href="/product/category/Regulador">Reguladores</a></li>
                                <li><a href="/product/category/Reproductor">Reproductores</a></li>
                                <li><a href="/product/category/Sintonizador">Sintonizadores</a></li>
                                <li><a href="/product/category/Smart">Smart</a></li>
                                <li><a href="/product/category/Transmisor">Transmisores</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Mantenimiento<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/product/category/Aire Comprimido">Aire Comprimido</a></li>
                                <li><a href="/product/category/Pasta termica">Pasta termica</a></li>
                                <li><a href="/product/category/Bateria">Baterias</a></li>
                                <li><a href="/product/category/Spray">Spray limpiador</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Contra el COVID<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/product/category/Careta">Careta</a></li>
                                <li><a href="/product/category/Cubrebocas">Cubrebocas</a></li>
                                <li><a href="/product/category/Gel">Gel Antibacterial</a></li>
                                <li><a href="/product/category/Desinfectante">Desinfectantes</a></li>
                                <li><a href="/product/category/Pulso">Pulso-oximetro</a></li>
                                <li><a href="/product/category/Termometro">Termometros</a></li>
                                <li><a href="/product/category/Toallas">Toallas Desinfectantes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Otros<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/product/category/Botella De Tinta">Botella De Tinta</a></li>
                                <li><a href="/product/category/Foco">Focos Leds</a></li>
                                <li><a href="/product/category/Folders">Folders</a></li>
                                <li><a href="/product/category/Lampara">Lamparas Led</a></li>
                                <li><a href="/product/category/Lentes">Lentes</a></li>
                                <li><a href="/product/category/Mini">Mini</a></li>
                                <li><a href="/product/category/Pila">Pilas</a></li>
                                <li><a href="/product/category/Rack">Racks</a></li>
                                <li><a href="/product/category/Rollo">Rollos de papel normal y termico</a></li>
                                <li><a href="/product/category/Silla">Sillas</a></li>
                                <li><a href="/product/category/Tira Led">Tiras Leds</a></li>
                                <li><a href="/product/category/Toner">Toners</a></li>
                                <li><a href="/product/category/Tripie">Tripies</a></li>
                                <li><a href="/product/category/Videoconsola">Videoconsolas</a></li>
                                <li><a href="/product/category/Undefined">Otros</a></li>
                            </ul>
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
