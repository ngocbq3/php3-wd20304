<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
//Trang chủ
Route::get('/', [HomeController::class, 'index']);
//Chi tiết bài viết
Route::get('/posts/{id}', [HomeController::class, 'show'])->name('posts.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.list');
