@extends('layouts.main')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <img src="{{ $post->image }}" width="100" alt="">
    <div>
        {{ $post->content }}
    </div>
@endsection
