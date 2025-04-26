<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy 5 danh mục mới nhất (mới nhất theo ngày tạo)
        $latestCategories = Category::orderBy('created_at', 'desc')->limit(5)->get();

        // Lấy 5 bài viết mới nhất (sắp xếp theo ngày tạo)
        $latestNews = News::with('category')->orderBy('created_at', 'desc')->limit(5)->get();
    
        // Lấy 9 bài viết hot (sắp xếp theo lượt xem)
        $hotNews = News::with('category')->orderBy('views', 'desc')->limit(9)->get();
    
        // Lấy tất cả danh mục kèm theo bài viết
        $newsByCategory = Category::with('news')->get();
    
        // Lấy 10 bài viết có lượt xem cao nhất
        $mostViewedNews = News::with('category')->orderBy('views', 'desc')->limit(10)->get();
    
        // Lấy 5 danh mục còn lại
        $remainingCategories = Category::orderBy('created_at', 'desc')->skip(5)->take(5)->get();
    
        // Trả về view index.blade.php với tất cả dữ liệu
        return view('index', compact('latestCategories', 'latestNews', 'hotNews', 'newsByCategory', 'mostViewedNews', 'remainingCategories'));
    }
}
