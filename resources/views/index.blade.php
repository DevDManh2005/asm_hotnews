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
                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}">
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
                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}">
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
/* 🌟 Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    background-color: #f9f9f9;
    color: #333;
}

/* 🌟 Bố cục tổng thể */
.container.home-container {
    max-width: 1200px; /* Chiều rộng tối đa */
    margin: 0 auto; /* Căn giữa container */
    padding: 20px; /* Padding cố định */
    background-color: #f9f9f9; /* Màu nền giống layout */
}

/* 🌟 Tiêu đề */
h1 {
    text-align: center;
    font-size: 36px;
    color: #007bff; /* Màu xanh dương đồng nhất */
    margin-bottom: 30px;
    font-weight: 700;
}

h2 {
    font-size: 24px; /* Giảm kích thước tiêu đề phụ */
    color: #007bff; /* Màu xanh dương đồng nhất */
    border-left: 3px solid #007bff; /* Viền trái nhẹ nhàng */
    padding-left: 10px;
    margin-bottom: 20px;
    font-weight: 600;
}

/* 🌟 Khu vực bài viết */
.news-section {
    margin-bottom: 40px; /* Khoảng cách giữa các phần */
}

/* 🌟 Hiển thị bài viết theo dạng lưới */
.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 cột trên desktop */
    gap: 25px; /* Khoảng cách giữa các bài viết */
    row-gap: 30px; /* Khoảng cách giữa các hàng */
}

/* 🌟 Bài viết */
.news-item {
    background: #fff; /* Nền trắng */
    padding: 15px; /* Padding cố định */
    border-radius: 8px; /* Bo góc nhẹ nhàng */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Bóng đổ nhẹ */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

/* 🌟 Hiệu ứng hover cho bài viết */
.news-item:hover {
    transform: translateY(-5px); /* Nhấc lên khi hover (nhẹ nhàng hơn) */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Bóng đổ đậm hơn */
}

/* 🌟 Hình ảnh bài viết */
.news-item img {
    width: 100%;
    height: 160px; /* Chiều cao hình ảnh đồng nhất */
    object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
    border-radius: 8px; /* Bo góc nhẹ nhàng */
    transition: transform 0.3s ease;
}

.news-item img:hover {
    transform: scale(1.03); /* Phóng to hình ảnh khi hover (nhẹ nhàng hơn) */
}

/* 🌟 Nội dung bài viết */
.news-item-content {
    padding: 10px 0; /* Padding nội dung */
}

.news-item-content h3 {
    font-size: 16px; /* Kích thước tiêu đề bài viết */
    color: #007bff; /* Màu xanh dương đồng nhất */
    margin: 10px 0;
    font-weight: 600;
    transition: color 0.3s;
}

.news-item-content h3:hover {
    color: #ffcc00; /* Màu vàng nổi bật khi hover */
}

.news-item-content p {
    font-size: 14px;
    color: #555; /* Màu chữ nhạt */
    margin: 5px 0; /* Giảm khoảng cách */
}

/* 🌟 Liên kết */
.news-item a {
    text-decoration: none; /* Ẩn dấu gạch dưới */
    color: inherit; /* Kế thừa màu sắc từ cha */
    transition: color 0.3s ease;
}

.news-item a:hover {
    color: #ffcc00; /* Màu vàng nổi bật khi hover */
}

/* 🌟 Responsive Design */
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

    h1 {
        font-size: 30px; /* Giảm kích thước tiêu đề */
    }

    h2 {
        font-size: 20px; /* Giảm kích thước tiêu đề phụ */
    }

    .news-item img {
        height: 140px; /* Giảm chiều cao hình ảnh */
    }
}
</style>
