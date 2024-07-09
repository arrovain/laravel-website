@extends('layouts.app')

@section('content')
    <h1>Haberler</h1>
    @foreach($news as $item)
        <div class="card mb-4">
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{{ Str::limit($item->content, 200) }}</p>
                <p class="card-text"><small class="text-muted">{{ $item->created_at->format('d.m.Y') }}</small></p>
            </div>
        </div>
    @endforeach
@endsection