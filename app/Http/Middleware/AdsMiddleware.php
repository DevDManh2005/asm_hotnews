<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Ad;

class AdsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Lấy tất cả quảng cáo từ cơ sở dữ liệu
        $ads = Ad::all();
        
        // Chia sẻ vào tất cả các view
        view()->share('ads', $ads);

        return $next($request);
    }
}
