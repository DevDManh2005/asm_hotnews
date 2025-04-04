@extends('layouts.layout')

@section('title', 'Bài Viết - ' . $category->name)

@section('noidung')
<div class="category-page">
    <h1>Danh mục: {{ $category->name }}</h1>

    <div class="news-list">
        @if($news->isEmpty())
            <p>Không có bài viết nào trong danh mục này.</p>
        @else
            @foreach ($news as $item)
                <!-- Thêm liên kết bao quanh mỗi bài viết -->
                <a href="{{ route('news.show', $item->slug) }}" class="news-item-link">
                    <div class="news-item">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                    
                        <div class="news-item-content">
                            <h3>{{ $item->title }}</h3>
                            <p>{{ Str::limit($item->content, 100) }}</p>
                            <p><strong>Ngày đăng:</strong> {{ $item->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</div>
@endsection
<style>
   /* 🌟 Bố cục tổng thể */
.category-page {
    max-width: 1200px; /* Chiều rộng tối đa đồng nhất */
    margin: 40px auto;
    padding: 20px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* 🌟 Tiêu đề danh mục */
.category-page h1 {
    text-align: center;
    color: #007bff; /* Màu xanh dương đồng nhất */
    margin-bottom: 30px;
    font-size: 36px;
    font-weight: 700;
}

/* 🌟 Danh sách bài viết */
.news-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Responsive grid */
    gap: 30px;
}

/* 🌟 Mỗi bài viết */
.news-item-link {
    text-decoration: none; /* Loại bỏ gạch dưới */
    color: inherit; /* Giữ nguyên màu chữ */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-item {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    height: 100%; /* Đảm bảo chiều cao đồng nhất */
    display: flex;
    flex-direction: column;
}

/* 🌟 Hiệu ứng hover cho bài viết */
.news-item-link:hover .news-item {
    transform: translateY(-10px); /* Nhấc lên khi hover */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); /* Bóng đổ đậm hơn */
}

/* 🌟 Hình ảnh bài viết */
.news-item img {
    width: 100%;
    height: 200px; /* Chiều cao cố định */
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.news-item img:hover {
    transform: scale(1.05); /* Phóng to hình ảnh khi hover */
}

/* 🌟 Nội dung bài viết */
.news-item-content {
    flex-grow: 1; /* Đảm bảo nội dung chiếm hết không gian còn lại */
    padding-top: 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Căn đều nội dung */
}

.news-item-content h3 {
    font-size: 18px;
    color: #007bff; /* Màu xanh dương đồng nhất */
    margin: 10px 0;
    font-weight: 600;
    transition: color 0.3s;
}

.news-item-content h3:hover {
    color: #ff9800; /* Màu cam khi hover */
}

.news-item-content p {
    font-size: 14px;
    color: #555;
    margin: 10px 0;
}

/* 🌟 Trường hợp không có bài viết */
.category-page p {
    text-align: center;
    font-size: 18px;
    color: #888;
    margin-top: 20px;
}

/* 🌟 Responsive Design */
@media (max-width: 1024px) {
    .category-page h1 {
        font-size: 30px;
    }

    .news-item img {
        height: 180px; /* Giảm chiều cao hình ảnh */
    }

    .news-item-content h3 {
        font-size: 16px;
    }

    .news-item-content p {
        font-size: 13px;
    }
}

@media (max-width: 768px) {
    .category-page {
        padding: 15px;
    }

    .category-page h1 {
        font-size: 26px;
    }

    .news-item img {
        height: 150px; /* Giảm chiều cao hình ảnh */
    }

    .news-item-content h3 {
        font-size: 15px;
    }

    .news-item-content p {
        font-size: 12px;
    }
}
</style>