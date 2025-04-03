@extends('layouts.layout')

@section('title', 'Trang Chủ')

@section('noidung')
<div class="container home-container">
    <h1>Trang Chủ</h1>

    <!-- Bài viết mới nhất -->
    <div class="news-section">
        <h2>Bài Viết Mới Nhất</h2>
        <div class="news-grid">
            @foreach ($latestNews as $news)
                <div class="news-item">
                    <a href="{{ route('news.show', $news->slug) }}">
                        <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $news->title }}">
                        <div class="news-item-content">
                            <h3>{{ $news->title }}</h3>
                            <p>{{ Str::limit($news->content, 100) }}</p>
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
        <h2>Bài Viết Hot</h2>
        <div class="news-grid">
            @foreach ($hotNews as $news)
                <div class="news-item">
                    <a href="{{ route('news.show', $news->slug) }}">
                        <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $news->title }}">
                        <div class="news-item-content">
                            <h3>{{ $news->title }}</h3>
                            <p>{{ Str::limit($news->content, 100) }}</p>
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
                            <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $news->title }}">
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
/* 🌟 Bố cục tổng thể */
.container.home-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* 🌟 Tiêu đề */
h1 {
    text-align: center;
    font-size: 36px;
    color: #1e3a8a; /* Màu xanh biển */
    margin-bottom: 30px;
    font-weight: 700;
}

h2 {
    font-size: 26px;
    color: #1e3a8a; /* Màu xanh biển */
    border-left: 5px solid #1e3a8a; /* Viền trái màu xanh biển */
    padding-left: 10px;
    margin-bottom: 20px;
    font-weight: 600;
}

/* 🌟 Khu vực bài viết */
.news-section {
    margin-bottom: 50px;
}

/* 🌟 Hiển thị bài viết theo dạng lưới */
.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px; /* Khoảng cách giữa các bài viết */
    row-gap: 40px; /* Khoảng cách giữa các hàng khi xuống dòng */
}

/* 🌟 Bài viết */
.news-item {
    background: #fff; /* Nền trắng */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Bóng đổ nhẹ */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

/* 🌟 Hiệu ứng hover cho bài viết */
.news-item:hover {
    transform: translateY(-10px); /* Nhấc lên khi hover */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); /* Bóng đổ đậm hơn */
}

/* 🌟 Hình ảnh bài viết */
.news-item img {
    width: 100%;
    height: 180px;
    object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.news-item img:hover {
    transform: scale(1.05); /* Phóng to hình ảnh khi hover */
}

/* 🌟 Nội dung bài viết */
.news-item-content {
    padding: 15px 0;
}

.news-item-content h3 {
    font-size: 18px;
    color: #1e3a8a; /* Màu xanh biển */
    margin: 10px 0;
    font-weight: 600;
    transition: color 0.3s;
}

.news-item-content h3:hover {
    color: #E65100; /* Màu cam khi hover */
}

.news-item-content p {
    font-size: 14px;
    color: #555; /* Màu chữ nhạt */
    margin: 10px 0;
}

/* 🌟 Liên kết */
.news-item a {
    text-decoration: none; /* Ẩn dấu gạch dưới */
}

.news-item a:hover {
    opacity: 0.8; /* Làm mờ nhẹ khi hover */
}

/* 🌟 Responsive: Mobile hiển thị 1 cột, Tablet hiển thị 2 cột */
@media (max-width: 1024px) {
    .news-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 cột trên tablet */
        gap: 20px; /* Giảm khoảng cách giữa các bài viết */
        row-gap: 25px; /* Khoảng cách giữa các hàng */
    }
}

@media (max-width: 768px) {
    .news-grid {
        grid-template-columns: repeat(1, 1fr); /* 1 cột trên mobile */
        gap: 15px; /* Giảm khoảng cách giữa các bài viết */
        row-gap: 20px; /* Khoảng cách giữa các hàng */
    }
}
</style>
