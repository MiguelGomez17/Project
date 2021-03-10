@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= e($categoria)?></div>

                <div class="panel-body">
                    <div class="container">
                        @foreach ($products as $product)
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 18rem;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text">${{ $product->price }}</p>
                                    <a href="/product/category/{{ $product->Category }}" class="card-text">{{ $product->Category }}</a><br>
                                    <a href="/product/{{ $product->id }}" class="btn btn-primary">Ver mas</a>
                                    </div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        @endforeach
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection