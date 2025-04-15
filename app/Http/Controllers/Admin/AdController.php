<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdController extends Controller
{
    // Hiển thị tất cả quảng cáo
    public function index()
    {
        $ads = Ad::all(); // Lấy tất cả quảng cáo từ cơ sở dữ liệu
        return view('admin.ads.index', compact('ads')); // Truyền dữ liệu quảng cáo vào view 'index'
    }

    // Hiển thị form thêm quảng cáo
    public function create()
    {
        return view('admin.ads.create');
    }

    // Lưu quảng cáo mới
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'brand_name' => 'nullable|string|max:255',
        'product_name' => 'nullable|string|max:255',
        'link' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
    }

    Ad::create([
        'title' => $request->title,
        'description' => $request->description,
        'brand_name' => $request->brand_name,
        'product_name' => $request->product_name,
        'link' => $request->link,
        'image' => $imagePath ? 'images/' . $request->file('image')->getClientOriginalName() : null,
    ]);

    return redirect()->route('admin.ads.index')->with('success', 'Quảng cáo đã được thêm thành công!');
}
    

    // Cập nhật quảng cáo
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('admin.ads.edit', compact('ad'));
    }

    // Cập nhật quảng cáo sau khi sửa
    // Cập nhật quảng cáo
public function update(Request $request, $id)
{
    // Validate dữ liệu từ form
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'brand_name' => 'nullable|string|max:255',
        'product_name' => 'nullable|string|max:255',
        'link' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $ad = Ad::findOrFail($id);
    $imagePath = $ad->image; // Giữ lại hình ảnh cũ nếu không có ảnh mới

    // Kiểm tra nếu có tệp hình ảnh mới được tải lên
    if ($request->hasFile('image')) {
        // Xóa hình ảnh cũ nếu có
        if ($ad->image) {
            $oldImagePath = public_path($ad->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Xóa ảnh cũ
            }
        }

        // Lưu ảnh mới vào thư mục public/images
        $imagePath = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
        $imagePath = 'images/' . $request->file('image')->getClientOriginalName(); // Lưu đường dẫn ảnh mới
    }

    // Cập nhật thông tin quảng cáo
    $ad->update([
        'title' => $request->title,
        'description' => $request->description,
        'brand_name' => $request->brand_name,
        'product_name' => $request->product_name,
        'link' => $request->link,
        'image' => $imagePath, // Cập nhật hình ảnh mới (hoặc giữ nguyên hình ảnh cũ)
    ]);

    return redirect()->route('admin.ads.index')->with('success', 'Quảng cáo đã được cập nhật thành công!');
}

    

    // Xóa quảng cáo
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);

        // Xóa hình ảnh nếu có
        if ($ad->image) {
            unlink(public_path($ad->image));
        }

        $ad->delete();

        return redirect()->route('admin.ads.index')->with('success', 'Quảng cáo đã được xóa!');
    }
}
