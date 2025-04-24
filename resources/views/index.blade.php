@extends('layouts.layout')

@section('title', 'Trang Chủ')

@section('noidung')
<div class="container home-container">
    <h1 style="color: red">HOTNEWS360</h1>
    <div class="news-section">
        <h2>Bài Viết Mới Nhất</h2>
        <div class="news-grid">
            @foreach ($latestNews as $news)
                <div class="news-item">
                    <a href="{{ route('news.show', $news->slug) }}">
                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}">
                        <div class="news-item-content">
                            <h3>{{ $news->title }}</h3>
                            <p>{{ Str::limit($news->content,5) }}</p>
                            <p><strong>Danh Mục:</strong> {{ $news->category->name }}</p>
                            <p><strong>Ngày đăng:</strong> {{ $news->created_at->format('d/m/Y') }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Bài viết hot -->
    <div class="news-section">
        <h2>Bài Viết Hot Nhất</h2>
        <div class="news-grid">
            @foreach ($hotNews as $news)
                <div class="news-item">
                    <a href="{{ route('news.show', $news->slug) }}">
                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}">
                        <div class="news-item-content">
                            <h3>{{ $news->title }}</h3>
                            <p>{{ Str::limit($news->content, 5) }}</p>
                            <p><strong>Danh Mục:</strong> {{ $news->category->name }}</p>
                            <p><strong>Lượt Xem:</strong> {{ $news->views }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Hiển thị bài viết theo danh mục -->
    @foreach ($newsByCategory as $category)
        <div class="news-section">
            <h2>{{ $category->name }}</h2>
            <div class="news-grid">
                @foreach ($category->news->take(3) as $news)
                    <div class="news-item">
                        <a href="{{ route('news.show', $news->slug) }}">
                            <img src="{{ asset($news->image) }}" alt="{{ $news->title }}">
                            <div class="news-item-content">
                                <h3>{{ $news->title }}</h3>
                                <p>{{ Str::limit($news->content, 100) }}</p>
                                <p><strong>Lượt Xem:</strong> {{ $news->views }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection

<style>
    /* Trang Chủ - Home Page */
.home-container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.home-container h1 {
    text-align: center;
    font-size: 36px;
    color: #007bff;
    margin-bottom: 30px;
    font-weight: bold;
}

/* Các phần mục bài viết */
.news-section {
    margin-bottom: 40px;
}

.news-section h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Grid cho các bài viết */
.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 bài viết mỗi hàng */
    gap: 20px;
}

/* Mỗi bài viết */
.news-item {
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

/* Hình ảnh bài viết */
.news-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 3px solid #f1f1f1;
}

/* Nội dung bài viết */
.news-item-content {
    padding: 15px;
}

.news-item-content h3 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #333;
}

.news-item-content p {
    font-size: 16px;
    color: #666;
    line-height: 1.5;
    margin-bottom: 10px;
}

.news-item-content strong {
    font-weight: bold;
}

/* Lượt xem */
.news-item-content p:last-child {
    color: #007bff;
    font-weight: bold;
}

/* Ẩn đường link */
.news-item a {
    text-decoration: none; /* Ẩn underline */
}

/* Responsive - Mobile */
@media (max-width: 768px) {
    .home-container {
        padding: 15px;
    }

    .news-section h2 {
        font-size: 24px;
    }

    .news-item-content h3 {
        font-size: 18px;
    }

    .news-item-content p {
        font-size: 14px;
    }

    .news-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    }
}

</style>