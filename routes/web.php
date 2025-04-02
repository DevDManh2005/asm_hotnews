<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

// Route trang chủ
Route::get('/', [HomeController::class, 'index'])->name('index');

// Route tĩnh
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/quangcao', function () {
    return view('quangcao');
})->name('quangcao');

// Route danh mục và bài viết
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Route gửi bình luận
Route::post('/news/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');