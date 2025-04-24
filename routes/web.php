<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCommentController;

// ----------------------------
// Nhóm Route cho trang chính (khách)
// ----------------------------

Route::get('/', [HomeController::class, 'index'])->name('index'); // Trang chủ

// Route danh mục và bài viết
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show'); // Xem bài viết theo danh mục
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show'); // Xem chi tiết bài viết

// ----------------------------
// Route tìm kiếm bài viết
// ----------------------------

Route::get('/search', [NewsController::class, 'search'])->name('news.search'); // Tìm kiếm bài viết





// ----------------------------
// Nhóm Route liên quan đến xác thực (Đăng nhập, Đăng ký, Quên mật khẩu)
// ----------------------------

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

// Route đăng xuất
Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------
// Nhóm Route cho người dùng đã đăng nhập
// ----------------------------

// Route cập nhật thông tin người dùng
Route::middleware('auth')->group(function () {
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::put('profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});

// ----------------------------
// Nhóm Route cho Admin (quản trị viên)
// ----------------------------

Route::middleware(['auth', CheckRole::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Quản lý bài viết (News)
    Route::resource('news', NewsController::class);

    // Quản lý danh mục (Categories)
    Route::resource('categories', CategoryController::class);

    // Quản lý người dùng
    Route::resource('users', UserController::class);

    // Quản lý bình luận
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('comments.index');
    Route::delete('/comments/{id}', [AdminCommentController::class, 'destroy'])->name('comments.delete');
});

// ----------------------------
// Các Route liên quan đến bình luận
// ----------------------------

Route::middleware('auth')->group(function () {
    // Thêm bình luận
    Route::post('/comments/{news_id}', [CommentController::class, 'store'])->name('comments.store');

    // Đánh giá bình luận
    Route::post('/comment/{comment_id}/rate', [CommentController::class, 'rateComment'])->name('comment.rate');
});
