@extends('layouts.layout')

@section('title', 'Kết quả tìm kiếm')

@section('noidung')
    <h1>Kết quả tìm kiếm cho: "{{ e($query) }}"</h1>

    @if($news->count() > 0)
        @foreach($news as $article)
            <div class="article-item">
                <!-- Hiển thị tiêu đề bài viết -->
                <h2 class="article-title">
                    <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
                </h2>
                <!-- Hiển thị hình ảnh bài viết nếu có -->
                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="article-image">
               
                <!-- Hiển thị phần tóm tắt nội dung -->
                <p class="article-excerpt">{{ Str::limit($article->content, 150) }}</p>

                <!-- Thêm thông tin ngày đăng -->
                <p class="article-date"><strong>Ngày đăng:</strong> {{ $article->created_at->format('d/m/Y') }}</p>

                <!-- Liên kết đọc thêm -->
                <a href="{{ route('news.show', $article->slug) }}" class="read-more">Đọc thêm</a>
            </div>
        @endforeach

        <!-- Hiển thị phân trang -->
        <div class="pagination">
            {{ $news->links() }}
        </div>
    @else
        <p>Không tìm thấy bài viết nào phù hợp với từ khóa "{{ e($query) }}"</p>
    @endif
@endsection
<style>
    /* Tạo kiểu cho danh sách bài viết */
.category-page {
    padding: 20px;
}

h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}

/* Tạo kiểu cho container chứa các bài viết */
.news-list {
    display: grid; /* Dùng grid để chia cột */
    grid-template-columns: repeat(3, 1fr); /* 3 cột mỗi hàng */
    gap: 20px; /* Khoảng cách giữa các bài viết */
    margin-top: 20px;
}

/* Tạo kiểu cho mỗi bài viết */
.article-item {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease-in-out;
}

.article-item:hover {
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.article-title {
    font-size: 20px;
    font-weight: bold;
    color: #007bff;
    margin-bottom: 10px;
}

.article-title a {
    text-decoration: none;
    color: inherit;
}

.article-title a:hover {
    text-decoration: underline;
}

.article-excerpt {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
}

.article-date {
    font-size: 12px;
    color: #777;
}

.article-image {
    width: 100%;
    height: auto;
    margin-bottom: 15px;
}

.read-more {
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

.read-more:hover {
    text-decoration: underline;
}

/* Phân trang */
.pagination {
    text-align: center;
    margin-top: 20px;
}

.pagination a {
    color: #007bff;
    margin: 0 5px;
    text-decoration: none;
    font-weight: bold;
}

.pagination a:hover {
    text-decoration: underline;
}

.pagination .disabled {
    color: #ccc;
    cursor: not-allowed;
}

.pagination .active {
    font-weight: bold;
    color: #007bff;
}

/* Responsive: Khi màn hình nhỏ hơn, giảm số cột */
@media (max-width: 1024px) {
    .news-list {
        grid-template-columns: repeat(2, 1fr); /* 2 cột trên màn hình nhỏ */
    }
}

@media (max-width: 768px) {
    .news-list {
        grid-template-columns: 1fr; /* 1 cột trên màn hình nhỏ nhất */
    }
}

</style>