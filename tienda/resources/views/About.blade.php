@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Quienes somos</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="text-center">
                            <h3 class="card-title">Sobre nosotros</h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0" style="max-width: 95%;">
                                    <p>
                                        DICESA es una empresa dedicada a la venta de productos y servicios de Computación
                                        y Tecnología, fue establecida en 1994 con el objetivo de hacer llegar a los hogares
                                        y empresas de la región, productos de vanguardia de gran utilidad y demanda, desarrollados
                                        con las últimas tecnologías, para facilitar y mejorar la calidad y estilo de vida de
                                        nuestros clientes.
                                    </p>
                                    {{-- <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer> --}}
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection