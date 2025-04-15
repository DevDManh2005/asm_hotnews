<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Ad;  // Import Ad model


class NewsController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        // Lấy các bài viết và sắp xếp theo ngày tạo giảm dần
        $news = News::orderBy('created_at', 'desc')->get();
        
        // Trả về view với danh sách bài viết đã sắp xếp
        return view('admin.news.index', compact('news'));
    }

    // Hiển thị form thêm bài viết
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    // Lưu bài viết mới
    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'nullable|string|unique:news,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra ảnh hợp lệ
        ]);
    
        // Tạo slug tự động từ tiêu đề
        $slug = Str::slug($request->title);
    
        // Kiểm tra và lưu hình ảnh
        if ($request->hasFile('image')) {
            // Lưu ảnh vào thư mục public/images
            $imagePath = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
        } else {
            $imagePath = null; // Nếu không có hình ảnh, để giá trị null
        }
    
        // Tạo bài viết mới
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'image' => 'images/' . $request->file('image')->getClientOriginalName(), // Lưu đường dẫn hình ảnh
            'views' => 0, // Mặc định là 0 lượt xem
        ]);
    
        return redirect()->route('admin.news.index')->with('success', 'Bài viết đã được thêm thành công!');
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    // Cập nhật bài viết
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'nullable|string|unique:news,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra ảnh hợp lệ
        ]);
    
        $news = News::findOrFail($id);
        $slug = $request->slug ?? Str::slug($request->title);
    
        // Nếu có hình ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($news->image) {
                $oldImagePath = public_path($news->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Xóa ảnh cũ
                }
            }
    
            // Lưu ảnh mới vào thư mục public/images
            $imagePath = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
            $imagePath = 'images/' . $request->file('image')->getClientOriginalName(); // Lưu đường dẫn ảnh mới
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $imagePath = $news->image;
        }
    
        // Cập nhật bài viết
        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'image' => $imagePath, // Lưu đường dẫn ảnh mới hoặc giữ nguyên ảnh cũ
            'views' => $request->views,
        ]);
    
        return redirect()->route('admin.news.index')->with('success', 'Bài viết đã được cập nhật!');
    }

    // Xóa bài viết
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        
        // Xóa hình ảnh cũ khi xóa bài viết
        if ($news->image) {
            unlink(public_path($news->image)); // Xóa ảnh
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Bài viết đã được xóa!');
    }

    // Hiển thị bài viết cho người dùng (front-end)
    public function show($slug)
    {
        // Lấy bài viết theo slug hoặc trả về 404 nếu không tìm thấy
        $news = News::where('slug', $slug)->firstOrFail();
        
        // Tăng số lượt xem
        $news->increment('views');
        
        // Lấy tất cả bình luận của bài viết này và phân trang
        $comments = $news->comments()->orderBy('created_at', 'desc')->paginate(10);
        
        // Lấy tất cả danh mục để hiển thị menu
        $categories = Category::all();
        
        // Lấy tất cả quảng cáo
        $ads = Ad::all();
        
        // Trả về view với dữ liệu
        return view('news.show', compact('news', 'comments', 'categories', 'ads'));
    }
    
}
