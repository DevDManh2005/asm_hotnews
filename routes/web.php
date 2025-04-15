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
use App\Http\Controllers\Admin\AdController;

// ----------------------------
// Nhóm Route cho trang chính (khách)
// ----------------------------

Route::get('/', [HomeController::class, 'index'])->name('index'); // Trang chủ

// Các route tĩnh
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
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show'); // Xem bài viết theo danh mục
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show'); // Xem chi tiết bài viết

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

Route::middleware('auth')->group(function () {
    // Hiển thị thông tin tài khoản
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    
    // Cập nhật thông tin tài khoản
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
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

    // Quản lý quảng cáo
    Route::resource('ads', AdController::class); // Đảm bảo sử dụng resource controller cho quảng cáo
});

// ----------------------------
// Các Route liên quan đến bình luận
// ----------------------------

Route::middleware('auth')->group(function () {
    // Thêm bình luận
    Route::post('/comments/{news_id}', [CommentController::class, 'store'])->name('comments.store');

    // Đánh giá bình luận
    Route::post('/comment/{comment_id}/rate', [CommentController::class, 'rateComment'])->name('comment.rate');

    // Xóa bình luận (chỉ admin có quyền xóa)
    Route::middleware('admin')->delete('/comments/{comment_id}', [CommentController::class, 'deleteComment'])->name('comments.delete');
});

// ----------------------------
// Quảng cáo - Hiển thị quảng cáo trong layout (dành cho các trang bên ngoài quản trị)
// ----------------------------

Route::get('/ads', [AdController::class, 'index'])->name('ads.index'); // Hiển thị quảng cáo trong layout
