@extends('admin.layouts.layout')

@section('title', 'Thêm mới bài viết')

@section('content')
    <div class="b-4">
        <form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="b-4">
                <label for="">Tiêu đề</label>
                <input type="text" name="title" class='form-control' id="">
            </div>
            <div class="b-4">
                <label for="">Danh mục</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="b-4">
                <label for="">Ảnh</label>
                <input type="file" name="image" id="">
            </div>
            <div class="b-4">
                <label for="">Mô tả</label>
                <textarea name="description" rows="5" class="form-control"></textarea>
            </div>
            <div class="b-4">
                <label for="">Nội dung</label>
                <textarea name="content" rows="10" class="form-control"></textarea>
            </div>
            <div class="b-4">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </form>
    </div>
@endsection
