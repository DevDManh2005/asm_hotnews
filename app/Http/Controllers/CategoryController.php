<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ad;  // Import Ad model


class CategoryController extends Controller
{
    // Hiển thị danh sách danh mục
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Hiển thị form thêm danh mục
    public function create()
    {
        return view('admin.categories.create');
    }

    // Lưu danh mục mới
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|unique:categories,slug',
    ]);

    $slug = $request->slug ? $request->slug : Str::slug($request->name);

    Category::create([
        'name' => $request->name,
        'slug' => $slug,
    ]);

    return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được thêm!');
}


    // Hiển thị form chỉnh sửa danh mục
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Cập nhật danh mục
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:categories,slug,' . $id,
    ]);

    $category = Category::findOrFail($id);
    $slug = Str::slug($request->name);

    $category->update([
        'name' => $request->name,
        'slug' => $slug,
    ]);

    return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật!');
}

    // Xóa danh mục
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được xóa!');
    }

    // Hiển thị danh mục theo slug và các bài viết trong danh mục
    public function show($slug)
    {
        // Lấy danh mục theo slug hoặc trả về 404 nếu không tìm thấy
        $category = Category::where('slug', $slug)->firstOrFail();
        
        // Lấy tất cả bài viết trong danh mục
        $news = News::where('category_id', $category->id)->get();
        
        // Lấy tất cả danh mục để hiển thị menu
        $categories = Category::all();
        
        // Lấy tất cả quảng cáo
        $ads = Ad::all();
        
        // Trả về view với dữ liệu
        return view('category.show', compact('category', 'news', 'categories', 'ads'));
    }
}
