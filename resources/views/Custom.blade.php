@extends('layouts.app')
@section('mytitle', '| Customizar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modificacion de Pagina principal
                </div>
                <div class="panel-body">
                    <div class="container">
                        <h2>Cargar imagen nueva</h2>
                        <form class="form-horizontal" method="POST" action='{{url("loadImages")}}' enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <label for="file" class="col-md-2 control-label">Archivo de imagen</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file" accept="image" required>
    
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
                    <div class="container">
                        <div class="item">
                            <h2>Imagenes actuales</h2>
                            @foreach($imagenes as $imagen)
                            <div class="text-center">
                                <img src="{{ asset($imagen->file) }}" alt="Error al cargar imagen" style="max-width: 40rem;">
                                <a href="/custom/delete/{{ $imagen->id }}" class="btn btn-danger">Eliminar</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
