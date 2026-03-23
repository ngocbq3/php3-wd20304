<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(); //Lấy toàn bộ

        //Sắp xếp
        $posts = Post::query()->orderBy('created_at', 'desc')->get();
        //Phân trang
        $posts = Post::query()->paginate(10);

        $post = $posts[1]; //Sử dụng function category trong model Post
        // return $post->category->name;
        $posts = Post::with('category') // Eager loading
            ->orderBy('id', 'desc')
            ->paginate(10); //phân trang với 10 bản ghi/1 trang

        $categories = Category::all();

        return view('clients.list', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
