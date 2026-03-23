@extends('layouts.main')

@section('title', 'Danh sách')

@section('content')
    @foreach ($posts as $post)
        <a href="{{ route('posts.show', $post->id) }}">
            <h1>{{ $post->title }}</h1>
        </a>
        <div>Danh mục: {{ $post->category->name }}</div>
        <img src="{{ $post->image }}" width="100" alt="">
        <div>
            {{ $post->content }}
        </div>
    @endforeach
    {{ $posts->links() }}

@endsection
