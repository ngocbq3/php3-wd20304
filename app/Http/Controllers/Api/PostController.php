<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('category')
            ->orderByDesc('created_at')
            ->paginate(10);
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = Post::query()->with('category')->find($id);

        if (!$post) {
            return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
        }

        return response()->json($post);
    }

    public function store(StoreRequestPost $request)
    {

        $data = $request->except('image');
        //Nhập số lượt xem = 0
        $data['view'] = 0;
        //Trường hợp chưa có ảnh
        $data['image'] = "";
        //Nhập ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images');
            $data['image'] = $image;
        }
        //Lưu vào database
        $post = Post::query()->create($data);

        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        //Lấy ra dữ liệu từ người dùng
        $data = $request->except('image');
        //Xử lý ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        }
        //Lưu dữ liệu
        $post = Post::query()->find($id);
        if (!$post) {
            return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
        }
        $post->update($data);
        return response()->json([
            'message' => 'Cập nhật bài viết thành công',
            'post' => $post
        ]);
    }
}
