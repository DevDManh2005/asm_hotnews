<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Các thuộc tính có thể gán hàng loạt.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'full_name', // Thêm full_name vào đây
        'email',
        'password',
        'avatar', // Thêm avatar vào đây
        'role', // Thêm role vào đây
        'gender', // Thêm gender vào đây
        'address', // Thêm address vào đây
    ];

    /**
     * Các thuộc tính bị ẩn khi trả về JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Các thuộc tính cần ép kiểu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
