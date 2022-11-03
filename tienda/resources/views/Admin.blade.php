@extends('layouts.app')
@section('mytitle', '| Administracion')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Administracion
                </div>
                <div class="panel-body">
                    <div class="container">
                        <h4>Pagina principal</h4>
                        <a href="/custom" class="btn btn-success">Cambiar pagina principal</a>
                        <h4>Cargar Archivos</h4>
                        <a href="/products/create" class="btn btn-success">Agregar producto</a>
                        <a href="/categories/import" class="btn btn-success">Importar lista de categorias desde CSV</a>
                        <a href="/products/import" class="btn btn-success">Importar productos desde CSV</a>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h4>Productos</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="width: 95%;">
                                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">#</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Nombre</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Clave</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Categoria</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Products as $Product)
                                                    <tr>
                                                        <th scope="row">{{$Product->id}}</th>
                                                        <td><a href="/product/{{ $Product->id }}">{{$Product->description}}</a> </td>
                                                        <td>{{$Product->brand}}</td>
                                                        @if(strpos($Product->category,','))
                                                        @php($categorias = explode(',',$Product->category))
                                                        <td>
                                                        @foreach($categorias as $categoria)
                                                        <a href="/category/{{$categoria}}">{{$categoria}}</a><br>
                                                        @endforeach
                                                        </td>
                                                        @else
                                                        <td><a href="/category/{{$Product->category}}">{{$Product->category}}</a></td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Usuarios</h4>
                        <table class="table" style="width: 95%;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo Electronico</th>
                                    <th scope="col">Tipo de usuario</th>
                                    <th scope="col">Nombrar / Quitar administrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Users as $User)
                                    <tr>
                                        <th scope="row">{{$User->id}}</th>
                                        <td><a href="/Users/{{ $User->id }}">{{$User->name}}</a> </td>
                                        <td>{{$User->email}}</td>
                                        <td>{{$User->type}}</td>
                                        @if($User->id==Auth::User()->id)
                                            <td>No puedes cambiar tu propio rango </td>
                                        @else
                                            <td><a href="/admin/{{ $User->id }}">Cambiar rango</a> </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $Users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
