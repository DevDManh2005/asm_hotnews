<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCommentController extends Controller
{
    // Hiển thị danh sách bình luận
    public function index()
    {
        // Lấy danh sách bình luận với thông tin bài viết và người dùng
        $comments = Comment::with('user', 'news')
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);  // Sử dụng phân trang để không tải hết bình luận cùng lúc
        
        // Trả về view với dữ liệu bình luận
        return view('admin.comments.index', compact('comments'));
    }

    // Xóa bình luận
    public function destroy($id)
    {
        // Tìm bình luận theo ID
        $comment = Comment::findOrFail($id);
        
        // Xóa bình luận
        $comment->delete();

        // Trả về thông báo thành công và chuyển hướng về trang danh sách bình luận
        return redirect()->route('admin.comments.index')->with('success', 'Bình luận đã được xóa!');
    }
}
