@extends('layouts.layout')

@section('title', $category->slug)

@section('noidung')
    <div class="category-page">
        <h1 class="text-center text-primary mb-4">{{ $category->name }}</h1>
        <div class="news-list">
            @if($news->isEmpty())
                <p>Không có bài viết nào trong danh mục này.</p>
            @else
                @foreach ($news as $item)
                    <!-- Thêm liên kết bao quanh mỗi bài viết -->
                    <a href="{{ route('news.show', $item->slug) }}" class="news-item-link text-decoration-none">
                        <div class="news-item card mb-3 shadow-sm rounded-lg custom-card-hover">
                            <div class="row g-0">
                                <!-- Hình ảnh bên trái -->
                                <div class="col-md-4">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="img-fluid rounded-start" style="object-fit: cover; height: 100%;">
                                </div>
                                <!-- Nội dung bên phải -->
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $item->title }}</h3>
                                        <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                                        <p class="text-muted"><strong>Ngày đăng:</strong> {{ $item->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@section('sidebar')
    <!-- Phần aside hiển thị các bài viết từ các danh mục khác -->
    <div class="category-articles">
        <h3>Bài Viết Khác</h3>

        <!-- Biến đếm để theo dõi thứ tự danh mục -->
        @php $counter = 1; @endphp

        <!-- Hiển thị các danh mục -->
        @foreach($categories->take(3) as $category)
            <div class="category-item mb-4">
                <h4>{{ $category->name }}</h4>

                <!-- Các bài viết trong mỗi danh mục -->
                <div class="category-articles-list d-flex flex-wrap gap-3">
                    @foreach($category->news->take(3) as $article)
                        <div class="category-article-item" style="flex: 1 0 calc(33% - 20px);">
                            <a href="{{ route('news.show', $article->slug) }}" class="text-decoration-none">
                                <div class="d-flex category-article-item-hover">
                                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="category-article-image" style="width: 120px; height: 80px; object-fit: cover; margin-right: 15px;">
                                    <div class="category-article-content">
                                        <h5>{{ Str::limit($article->title, 30) }}</h5>
                                        <p>{{ Str::limit($article->content, 50) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Quảng cáo dưới mỗi danh mục, thay đổi ảnh quảng cáo cho mỗi danh mục -->
                <div class="ad-space text-center my-3">
                    <p>Quảng cáo</p>
                    <div class="advertisement">
                        <!-- Quảng cáo cho danh mục với id động -->
                        @if($counter == 1)
                            <div class="ad-item">
                                <img src="{{ asset('images/banner2.gif') }}" alt="Advertisement" class="img-fluid">
                             
                            </div>
                        @elseif($counter == 2)
                            <div class="ad-item">
                                <img src="{{ asset('images/banner30-4.jpg') }}" alt="Advertisement" class="img-fluid">
                               
                            </div>
                        @elseif($counter == 3)
                            <div class="ad-item">
                                <img src="{{ asset('images/bannerphu.jpg') }}" alt="Advertisement" class="img-fluid">
                            

                            </div>
                        @else
                            <!-- Quảng cáo mặc định cho các danh mục khác -->
                            <div class="ad-item">
                                <img src="{{ asset('images/HOTNEWS360_banner1.gif') }}" alt="Advertisement" class="img-fluid">
                    
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tăng biến đếm để gán ID cho danh mục tiếp theo -->
            @php $counter++; @endphp
        @endforeach
    </div>
@endsection

<style>
    /* Hiệu ứng hover cho các bài viết trong category */
    .category-article-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .category-article-item img:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }

    /* Sidebar */
    .category-articles {
        margin-top: 30px;
        padding: 10px;
    }

    .category-item h4 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        transition: color 0.3s ease;
    }

    /* Hiệu ứng hover cho các mục trong danh mục (category-item) */
    .category-item:hover {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .category-articles-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .category-article-item {
        flex: 1 0 calc(33% - 20px);
        padding: 10px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hiệu ứng khi hover vào các bài viết trong sidebar */
    .category-article-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .category-article-item img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 15px;
    }

    .category-article-content {
        flex-grow: 1;
    }

    /* Hiệu ứng hover cho các bài viết */
    .news-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .news-item .card-img-top {
        transition: transform 0.3s ease;
    }

    /* Hiệu ứng hover cho hình ảnh trong bài viết */
    .news-item img:hover {
        transform: scale(1.1);
    }

    /* Hiệu ứng hover cho quảng cáo */
    .ad-img {
        transition: transform 0.3s ease;
    }

    .ad-img:hover {
        transform: scale(1.05);
    }

    /* Cải thiện khoảng cách và hiển thị của các quảng cáo */
    .ad-item {
        margin-top: 15px;
        transition: transform 0.3s ease;
    }

    /* Thêm padding cho các phần trong sidebar */
    .category-article-content {
        flex-grow: 1;
    }

    /* Hiệu ứng hover cho sidebar */
    .category-article-item .category-article-title {
        font-size: 1.1rem;
        font-weight: bold;
        color: #333;
    }

    .category-article-item .category-article-text {
        color: #777;
        font-size: 0.9rem;
    }

    /* Bố cục sidebar */
    .category-articles-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Bố cục sidebar item */
    .category-article-item {
        display: flex;
        align-items: center;
        padding: 12px;
        border-radius: 8px;
        background-color: #f9f9f9;
        transition: all 0.3s ease;
    }

    .category-article-item:hover {
        background-color: #e9ecef;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Quảng cáo mặc định */
    .category-item {
        margin-bottom: 30px;
    }

    /* Tạo hiệu ứng hover đẹp cho category item */
    .category-item:hover {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    /* Thêm khoảng cách giữa các item */
    .category-article-item img {
        width: 100%;
        height: auto;
    }

    /* Tạo độ sáng cho tiêu đề bài viết */
    .category-item h4 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
    }
</style>

