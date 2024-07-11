@extends('layouts.admin')

@section('content')
    <h1>News</h1>
    <a href="{{ route('news.create') }}">Create News</a>
    <ul>
        @foreach ($news as $newsItem)
            <li>
                <a href="{{ route('news.show', $newsItem) }}">{{ $newsItem->title }}</a>
                <a href="{{ route('news.edit', $newsItem) }}">Edit</a>
                <form action="{{ route('news.destroy', $newsItem) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
