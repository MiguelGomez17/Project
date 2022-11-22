@extends('layouts.app')
@section('mytitle', '| Importar lista de categorias')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Importar archivo
                </div>
                <div class="panel-body">
                    <div class="container" style="width: 100%">
                        <div class="alert alert-danger" id="warning" role="alert">
                            El importar un archivo de categorias <a href="#" class="alert-link">eliminara todas las categorias</a> de la base de datos actual.
                        </div>
                        <div class="alert alert-info" id="load-message" style="display: none;" role="alert">
                            Este proceso puede tardar unos minutos
                        </div>
                    </div>
                    <div class="container" style="width: 100%">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Mostrar instrucciones
                        </button>
                        <br><br>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Instrucciones para subir archivos</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container" style="width: 100%;">
                                            <h3>(1) Crear archivo con datos</h3>
                                            <h4>En un archivo de Excel haga una lista con la numeracion de cada categoria, el titulo a mostrar y
                                                las primeras 3 o 4 letras de las claves de los productos que entraran en esta categoria, una por
                                                cada celda.
                                            </h4>
                                            <h4>
                                                Use numeros multiplos de 100 para el titulo principal, y los siguientes a este para subtitulos.
                                                Como se muestra en la siguiente imagen.
                                            </h4>
                                            <img class="card-img-top" src="{{asset('images/Gn2RM01hdT10CbhasDL/(4).png')}}" style="width: 95%;" alt="Card image cap">
                                        </div>
                                        <div class="container" style="width: 100%;">
                                            <h3>(2) Guardar archivo</h3>
                                            <h4>En Excel vaya "Archivo" y entre en la seccion "Guardar Como"</h4>
                                            <img class="card-img-top" src="{{asset('images/Gn2RM01hdT10CbhasDL/(2).png')}}" style="width: 95%;" alt="Card image cap">
                                            <h4>En tipo de archivo seleccione "CSV (delimitado por comas)"</h4>
                                            <h5>El archivo puede tener cualquier nombre.</h5>
                                            <img class="card-img-top" src="{{asset('images/Gn2RM01hdT10CbhasDL/(3).png')}}" style="width: 95%;" alt="Card image cap">
                                        </div>
                                        <div class="container" style="width: 100%;">
                                            <h3>(3) Suba el archivo</h3>
                                            <h4>Suba el archivo en la pagina actual y espere hasta que finalice el proceso.</h4>
                                        </div>
                                        <div class="container" style="width: 100%;">
                                            <h3>Nota</h3>
                                            <h4>Se recomienda subir un archivo de productos al finalizar este proceso para actualizar los productos a su respectiva categoria.</h4>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="form-horizontal" name="File" method="POST" action="{{url("catImport")}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <label for="file" class="col-md-2 control-label">Archivo CSV</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file"  accept=".csv" required>

                                    @if ($errors->has('file'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <p><button type="submit" class="btn btn-success" name="submit" onclick="showDiv()"><i class="fa fa-check"></i> Subir</button></p>
                            <div id="load-bar" class="progress progress-striped active" style="display: none; width: 100%">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    <span class="">Espere un momento</span>
                                </div>
                            </div>
                        </form>
                        <p>{{session('status')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showDiv() {
        if(document.forms["File"]["file"].value !=""){
            document.getElementById('load-bar').style.display = "block";
            document.getElementById('load-message').style.display = "block";
            document.getElementById('warning').style.display = "none";
        }
    }
</script>
@endsection
