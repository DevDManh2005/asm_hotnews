<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function show($slug)
    {
        // Lấy bài viết theo slug hoặc trả về 404 nếu không tìm thấy
        $news = News::where('slug', $slug)->firstOrFail();

        // Lấy tất cả danh mục để hiển thị menu
        $categories = Category::all();

        // Trả về view với dữ liệu
        return view('news.show', compact('news', 'categories'));
    }
}