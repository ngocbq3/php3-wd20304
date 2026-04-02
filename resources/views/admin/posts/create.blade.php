@extends('admin.layouts.layout')

@section('title', 'Thêm mới bài viết')

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
        <form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="b-4">
                <label for="">Tiêu đề</label>
                <input type="text" name="title" class='form-control' value="{{ old('title') }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="b-4">
                <label for="">Ảnh</label>
                <input type="file" name="image" id="">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="b-4">
                <label for="">Mô tả</label>
                <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="b-4">
                <label for="">Nội dung</label>
                <textarea name="content" rows="10" class="form-control"></textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="b-4">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </form>
    </div>
@endsection
