<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
   
    
    public function boot()
    {
        // Chia sẻ danh sách danh mục với tất cả các view
        View::composer('*', function ($view) {
            $categories = Category::all(); // Lấy tất cả danh mục từ database
            $view->with('categories', $categories);
        });
    }
}