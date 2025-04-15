<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Phương thức hiển thị trang Dashboard cho Admin
    public function index()
    {
        // Bạn có thể lấy dữ liệu cần thiết từ database, ví dụ:
        // $postsCount = Post::count();
        // $usersCount = User::count();

        // Trả về view dashboard và truyền dữ liệu (nếu có)
        return view('admin.dashboard'); // Đảm bảo rằng bạn có file view tại resources/views/admin/dashboard.blade.php
    }
}
