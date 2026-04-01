@extends('admin.layouts.layout')

@section('title', 'Danh sách bài viết')

@section('content')
    <h1>Danh sách bài viết</h1>
    <table class="table">
        <tr>
            <th>#ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Category</th>
            <th>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                    Create
                </a>
            </th>
        </tr>

        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td> {{ $post->title }} </td>
                <td>
                    <img src="{{ Storage::URL($post->image) }}" width="100">
                </td>
                <td> {{ $post->category->name }} </td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn có muốn xóa không?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $posts->links() }}
@endsection
