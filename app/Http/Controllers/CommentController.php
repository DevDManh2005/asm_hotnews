<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Hiển thị bình luận của bài viết
    public function showComments($news_id)
    {
        // Lấy bài viết theo news_id
        $news = News::findOrFail($news_id);

        // Lấy tất cả bình luận của bài viết này và phân trang
        $comments = $news->comments()->orderBy('created_at', 'desc')->paginate(10);

        // Trả về view cùng với dữ liệu bài viết và bình luận
        return view('news.show', compact('news', 'comments'));
    }

    // Thêm bình luận mới
    public function store(Request $request, $news_id)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'rating' => 'nullable|integer|min:1|max:5', // Đảm bảo đánh giá nằm trong khoảng từ 1 đến 5
        ]);

        $news = News::findOrFail($news_id);

        // Lưu bình luận mới
        Comment::create([
            'user_id' => Auth::id(),
            'news_id' => $news->id,
            'content' => $request->content,
            'rating' => $request->rating ?? 0, // Nếu không có rating, mặc định là 0
        ]);

        return redirect()->route('news.show', $news->slug)->with('success', 'Bình luận của bạn đã được gửi!');
    }

    // Đánh giá bình luận
    public function rateComment(Request $request, $comment_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5', // Đảm bảo đánh giá nằm trong khoảng từ 1 đến 5
        ]);

        $comment = Comment::findOrFail($comment_id);

        // Cập nhật rating
        $comment->rating = $request->rating;
        $comment->save();

        return back()->with('success', 'Đánh giá của bạn đã được cập nhật!');
    }

    // Xóa bình luận
    public function deleteComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $news_id = $comment->news_id;

        $comment->delete();

        // Cập nhật lại số lượng bình luận
        $news = News::findOrFail($news_id);
        $news->decrement('comments_count');

        return redirect()->route('news.show', $news_id)->with('success', 'Bình luận đã được xóa!');
    }
}
