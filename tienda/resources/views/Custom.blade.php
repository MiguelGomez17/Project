@extends('layouts.app')

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
                        <form class="form-horizontal" method="POST" action="{{url("loadImages")}}" enctype="multipart/form-data">
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
                            
                            <div class="form-group{{ $errors->has('file1') ? ' has-error' : '' }}">
                                <label for="file1" class="col-md-2 control-label">Archivo de imagen</label>

                                <div class="col-md-6">
                                    <input id="file1" type="file" class="form-control" name="file1" accept="image" required>
    
                                    @if ($errors->has('file1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('file1') }}</strong>
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
