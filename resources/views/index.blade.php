@extends('layouts.main')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Hayatın beklenmedik süprizlerine karşı önlem aldınız mı?</h1>
    <p class="lead">Sigorta Çözümlerimizi inceleyin.</p>
</div>
<div class="container">
    <h2>En Çok Tercih Edilen Ürünlerimiz</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="#" class="btn btn-primary">Detaylar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container">
    <h2>Haberler</h2>
    <div class="row">
        @foreach($news as $news_item)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $news_item->title }}</h5>
                        <p class="card-text">{{ Str::limit($news_item->content, 100) }}</p>
                        <a href="#" class="btn btn-primary">Devamını Oku</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
