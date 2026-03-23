<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //Lấy danh sách categories
        $categories = DB::table('categories')->get();

        $posts = DB::table('posts')->get(); //lấy toàn bộ dl
        //Danh sách 8 bài viết 
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'name')
            ->limit(8)
            ->get();

        return view('clients.home', compact('posts', 'categories'));
    }

    //Hiển thị chi tiết
    public function show($id)
    {
        //Lấy bài viết theo id
        $post = DB::table('posts')->where('id', $id)->first();

        return view('clients.post', compact('post'));
    }
}
