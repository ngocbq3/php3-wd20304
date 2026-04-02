<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
//Trang chủ
Route::get('/', [HomeController::class, 'index']);
//Chi tiết bài viết
Route::get('/posts/{id}', [HomeController::class, 'show'])->name('posts.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.list');

Route::get('login', function () {
    return "LOGIN";
})->name('login');

//Admin
Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        //Bài viết (post)
        Route::prefix('posts')->group(function () {
            Route::get('/', [AdminPostController::class, 'index'])->name('admin.posts.index'); //Danh sách
            Route::delete('/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy'); //Xóa

            //Form Thêm mới
            Route::get('/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
            //Lưu bản ghi thêm mới vào CSDL
            Route::post('/create', [AdminPostController::class, 'store'])->name('admin.posts.store');
            //Form sửa
            Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
            //Cập nhật vào CSDL
            Route::put('/edit/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
        });
    });
});
