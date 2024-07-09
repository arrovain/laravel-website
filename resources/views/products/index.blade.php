@extends('layouts.app')

@section('content')
    <h1>Ürünler</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text"><strong>Fiyat: {{ $product->price }} TL</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection