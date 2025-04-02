<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function show($slug)
    {
        // Lấy danh mục theo slug hoặc trả về 404 nếu không tìm thấy
        $category = Category::where('slug', $slug)->firstOrFail();

        // Lấy tất cả bài viết trong danh mục
        $news = News::where('category_id', $category->id)->get();

        // Lấy tất cả danh mục để hiển thị menu
        $categories = Category::all();

        // Trả về view với dữ liệu
        return view('category.show', compact('category', 'news', 'categories'));
    }
}