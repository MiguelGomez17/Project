@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Importar archivo
                </div>
                <div class="panel-body">
                    <div class="alert alert-danger" role="alert">
                        El importar un archivo de productos <a href="#" class="alert-link">eliminara todos los productos</a> de la base de datos actual
                    </div>
                    <div class="container">
                        <form class="form-horizontal" method="POST" action="{{url("import")}}" enctype="multipart/form-data">
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
                            <p><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i>Enviar</button></p>
                        </form>
                        <p>{{session('status')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
