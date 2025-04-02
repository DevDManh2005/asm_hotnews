<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Nếu bảng sử dụng tên khác, bạn có thể chỉ định tên bảng ở đây
    protected $table = 'comments'; // Tên bảng nếu không theo quy tắc của Laravel

    // Các trường có thể gán đại trà
    protected $fillable = ['author', 'content', 'news_id'];

    // Mối quan hệ với bài viết (News)
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id'); // Sử dụng 'news_id' làm khóa ngoại
    }
}
