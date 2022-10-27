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
                    <div class="alert alert-danger" id="warning" role="alert">
                        El importar un archivo de categorias <a href="#" class="alert-link">eliminara todas las categorias</a> de la base de datos actual.
                    </div>
                    <div class="alert alert-info" id="load-message" style="display: none;" role="alert">
                        Este proceso puede tardar unos minutos
                    </div>
                    <div class="container">
                        <form class="form-horizontal" name="File" method="POST" action="{{url("catImport")}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <label for="file" class="col-md-2 control-label">Archivo CSV</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file" accept="CSV" required>

                                    @if ($errors->has('file'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <p><button type="submit" class="btn btn-success" name="submit" onclick="showDiv()"><i class="fa fa-check"></i> Subir</button></p>
                            <div id="load-bar" class="progress progress-striped active" style="display: none; width: 95%">
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
