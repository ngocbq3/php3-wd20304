@extends('layouts.main')

@section('title', 'Trang chủ')

@section('content')
    <h1>Bài viết mới nhất</h1>
    @foreach ($posts as $post)
        <div>
            <div>
                <a href="{{ route('posts.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </div>
            <div>
                <img src="{{ $post->image }}" width="100" alt="">
            </div>
            <div>
                Danh mục: {{ $post->name }}
            </div>
        </div>
        <hr>
    @endforeach
@endsection
