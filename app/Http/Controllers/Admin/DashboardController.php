<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Phương thức hiển thị trang Dashboard cho Admin
    public function index()
    {
        // Lấy tổng số bài viết
        $totalNews = News::count();

        // Lấy tổng số người dùng
        $totalUsers = User::count();

        // Lấy tổng lượt xem của website (cộng tổng lượt xem từ tất cả bài viết)
        $totalViews = News::sum('views');

        // Lấy 5 bài viết có lượt xem nhiều nhất
        $topNews = News::orderBy('views', 'desc')->take(5)->get();

        // Lấy 5 bình luận mới nhất
        $recentComments = Comment::with('news')  // Giả sử bạn có quan hệ với bảng News trong model Comment
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Trả về view dashboard với dữ liệu
        return view('admin.dashboard', compact('totalNews', 'totalUsers', 'totalViews', 'topNews', 'recentComments'));
    }
}
