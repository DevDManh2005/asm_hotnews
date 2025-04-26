@extends('layouts.layout')

@section('title', 'Trang Chủ')

@section('noidung')
    <div class="container home-container">
        <h1 class="text-center text-primary mb-4">HOTNEWS360</h1>

        <!-- Bài viết mới nhất (Carousel Slider) -->
        <div class="news-section mb-5">
            <div id="latestNewsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($latestNews as $index => $news)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <a href="{{ route('news.show', $news->slug) }}" class="text-decoration-none">
                                <!-- Hình ảnh -->
                                <div class="d-flex justify-content-center align-items-center"
                                    style="height: 350px; overflow: hidden;">
                                    <img src="{{ asset($news->image) }}" class="d-block w-100" alt="{{ $news->title }}"
                                        style="object-fit: cover;">
                                </div>
                                <!-- Thông tin bài viết (tiêu đề, mô tả) dưới hình ảnh -->
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3">
                                    <h3 class="text-white">{{ $news->title }}</h3>
                                    <p class="text-white">{{ Str::limit($news->content, 100) }}</p>
                                    <p class="text-white"><strong>Danh Mục:</strong> {{ $news->category->name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#latestNewsCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#latestNewsCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Bài viết hot -->
        <div class="news-section mb-5">
            <h2 class="text-danger mb-3"><i class="fas fa-fire"></i> Bài Viết Hot Nhất</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($hotNews as $news)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <a href="{{ route('news.show', $news->slug) }}" class="text-decoration-none">
                                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="card-img-top"
                                    style="transition: transform 0.3s ease;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $news->title }}</h5>
                                    <p class="card-text">{{ Str::limit($news->content, 100) }}</p>
                                    <p><strong>Danh Mục:</strong> {{ $news->category->name }}</p>
                                    <p><strong>Lượt Xem:</strong> {{ $news->views }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Quảng cáo dưới bài viết xem nhiều nhất (Banner 1) -->
        <div class="advertisement text-center my-4">
            <img src="{{ asset('images/banner30-4.jpg') }}" alt="Advertisement" class="img-fluid">
        </div>

        <!-- Hiển thị 7 danh mục với 3 bài viết cho mỗi danh mục -->
        @foreach ($latestCategories as $index => $category)
            <div class="news-section mb-5">
                <h2 class="text-info mb-3"><i class="fas fa-folder"></i> {{ $category->name }}</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($category->news->take(3) as $news)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <a href="{{ route('news.show', $news->slug) }}" class="text-decoration-none">
                                    <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="card-img-top" 
                                        style="transition: transform 0.3s ease;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ Str::limit($news->title, 30) }}</h5>
                                        <p class="card-text">{{ Str::limit($news->content, 50) }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if (($index + 1) % 2 == 0)
                    @if (($index + 1) == 2)
                        <div class="advertisement text-center my-4">
                            <img src="{{ asset('images/HOTNEWS360_banner1.gif') }}" alt="Advertisement" class="img-fluid">
                        </div>
                    @endif

                    @if (($index + 1) == 4)
                        <div class="advertisement text-center my-4">
                            <img src="{{ asset('images/LDM.gif') }}" alt="Advertisement" class="img-fluid">
                        </div>
                    @endif
                @endif
            </div>
        @endforeach
    </div>
@endsection

@section('sidebar')
   <!-- Sidebar: Bài viết xem nhiều nhất (chỉ 3 bài viết) -->
<div class="sidebar card p-3 shadow-sm">
    <h4 class="text-primary mb-3"><i class="fas fa-eye"></i> Bài Viết Xem Nhiều</h4>
    <ul class="list-group">
        @foreach ($mostViewedNews->take(5) as $news)
            <li class="list-group-item d-flex align-items-center">
                <!-- Thêm ảnh bài viết bên trái -->
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="recent-article-image rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                
                <!-- Tiêu đề và lượt xem -->
                <div class="d-flex flex-column">
                    <a href="{{ route('news.show', $news->slug) }}" class="text-decoration-none">
                        <strong>{{ Str::limit($news->title, 25) }}</strong>
                    </a>
                    <small class="text-muted">Lượt Xem: {{ $news->views }}</small>
                </div>
            </li>
        @endforeach
    </ul>
</div>

    <!-- Quảng cáo dưới bài viết xem nhiều nhất (Banner 1) -->
    <div class="advertisement text-center my-4">
        <img src="{{ asset('images/banner30-4.jpg') }}" alt="Advertisement" class="img-fluid">
    </div>

    <!-- Hiển thị danh mục còn lại với 3 bài viết cho mỗi danh mục -->
    @foreach ($remainingCategories as $index => $category)
        <div class="news-section mb-5">
            <h2 class="text-info mb-3"><i class="fas fa-folder"></i> {{ $category->name }}</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($category->news->take(3) as $news)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <a href="{{ route('news.show', $news->slug) }}" class="text-decoration-none">
                                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="card-img-top" style="transition: transform 0.3s ease;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ Str::limit($news->title, 20) }}</h5>
                                    <p class="card-text">{{ Str::limit($news->content, 40) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Chèn banner quảng cáo dưới mỗi 2 danh mục -->
            @if (($index + 1) % 2 == 0)
                <!-- Banner quảng cáo 1 cho danh mục thứ 2 -->
                @if (($index + 1) == 2)
                    <div class="advertisement text-center my-4">
                        <img src="{{ asset('images/HOTNEWS360_banner1.gif') }}" alt="Advertisement" class="img-fluid">
                    </div>
                @endif

                <!-- Banner quảng cáo 2 cho danh mục thứ 4 -->
                @if (($index + 1) == 4)
                    <div class="advertisement text-center my-4">
                        <img src="{{ asset('images/LDM.gif') }}" alt="Advertisement" class="img-fluid">
                    </div>
                @endif
            @endif
        </div>
    @endforeach
@endsection
