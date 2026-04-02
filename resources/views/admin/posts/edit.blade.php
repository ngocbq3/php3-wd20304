@extends('admin.layouts.layout')

@section('title', 'Cập nhật bài viết')

@section('content')
    <div class="b-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endsession
        <form action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="b-4">
                <label for="">Tiêu đề</label>
                <input type="text" name="title" value="{{ $post->title }}" class='form-control' id="">
            </div>
            <div class="b-4">
                <label for="">Danh mục</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @selected($cate->id == $post->category_id)>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="b-4">
                <label for="">Ảnh</label> <br>
                <img src="{{ Storage::URL($post->image) }}" width="100" alt="">
                <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="b-4">
                <label for="">Mô tả</label>
                <textarea name="description" rows="5" class="form-control">{{ $post->description }}</textarea>
            </div>
            <div class="b-4">
                <label for="">Nội dung</label>
                <textarea name="content" rows="10" class="form-control">{{ $post->content }}</textarea>
            </div>
            <div class="b-4">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection
