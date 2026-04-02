<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestPost;
use App\Http\Requests\UpdateRequestPost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view(
            'admin.posts.index',
            compact('posts')
        );
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index')->with('success', 'Xóa dữ liệu thành công');
    }

    //form thêm
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }
    //Thêm dữ liệu
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
        Post::query()->create($data);
        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Thêm dữ liệu thành công');
    }

    //Form edit
    public function edit($id)
    {
        $post = Post::query()->findOrFail($id);
        $categories = Category::all();
        return view(
            'admin.posts.edit',
            compact('post', 'categories')
        );
    }
    //Cập nhật vào CSDL
    public function update(UpdateRequestPost $request, $id)
    {
        //Lấy ra dữ liệu từ người dùng
        $data = $request->except('image');
        //Xử lý ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        }
        //Lưu dữ liệu
        $post = Post::query()->findOrFail($id);
        $post->update($data);
        return redirect()
            ->route('admin.posts.edit', $post->id)
            ->with('success', 'Cập nhật dữ liệu thành công');
    }
}
