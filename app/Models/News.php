<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'views', 'image', 'category_id'];

    // Liên kết với danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Liên kết với bình luận
    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }
}
