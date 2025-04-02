<?php 
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'post_id' => 'required|exists:news,id',
        ]);

        // Lưu bình luận vào cơ sở dữ liệu
        Comment::create([
            'author' => $request->author,
            'content' => $request->content,
            'post_id' => $request->post_id,
        ]);

        // Quay lại trang chi tiết bài viết
        return redirect()->route('news.show', $request->post_id)->with('success', 'Bình luận của bạn đã được gửi');
    }
}
