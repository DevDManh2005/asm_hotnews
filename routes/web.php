<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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


// 🔹 Nhóm route liên quan đến xác thực
Route::middleware('guest')->group(function () {
    // Đăng ký
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Đăng nhập
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Quên mật khẩu
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
});

// 🔹 Route đăng xuất (chỉ cho người đã đăng nhập)
Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');