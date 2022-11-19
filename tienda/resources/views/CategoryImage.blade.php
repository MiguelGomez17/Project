@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Helper::admin())
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Editar imagen de categoria "{{$categoria->titulo}}"</h4>
                    </div>
                    <div class="container">
                        <form class="form-horizontal" autocomplete="off" method="POST" action="/catEdit/{{$categoria->id}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="col-md-2 control-label">Imagen</label>
                                <div class="col-md-8">
                                    <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" accept="image">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Acceso denegado
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            No tienes autorizacion para ver esta pagina.
                            <?=redirect()->route('home');?> 
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection