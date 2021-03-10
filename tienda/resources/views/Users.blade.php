@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= e($Usuario['name']) ?>
                </div>
                @if($Usuario['type']=='admin')
                    <div class="panel-body">
                        Administrador
                    </div>
                @endif
                <div class="panel-body">
                    Hola
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
