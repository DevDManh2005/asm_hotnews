<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Kiểm tra nếu người dùng đã đăng nhập và có vai trò chính xác
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Nếu không có quyền truy cập, chuyển hướng
        return redirect('/')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
