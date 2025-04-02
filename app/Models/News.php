<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

   // Trong News.php (Mô hình News)
protected $fillable = ['title', 'content', 'category_id', 'image']; // Đảm bảo có 'image' trong mảng này


    // Liên kết với danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Liên kết với bình luận
    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id'); // Chỉ định rõ khóa ngoại là 'news_id'
    }
}
