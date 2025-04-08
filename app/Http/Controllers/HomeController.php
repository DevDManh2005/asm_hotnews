<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy danh sách danh mục
        $categories = Category::all();
    
        // Lấy 5 bài viết mới nhất (sắp xếp theo ngày tạo)
        $latestNews = News::with('category')->orderBy('created_at', 'desc')->limit(5)->get();
    
        // Lấy 5 bài viết hot (sắp xếp theo lượt xem)
        $hotNews = News::with('category')->orderBy('views', 'desc')->limit(5)->get();
    
        // Lấy danh mục kèm theo bài viết
        $newsByCategory = Category::with('news')->get();
    
        // Trả về view index.blade.php với dữ liệu
        return view('index', compact('categories', 'latestNews', 'hotNews', 'newsByCategory'));

    }
}
