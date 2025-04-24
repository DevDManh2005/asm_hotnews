@extends('layouts.layout')

@section('title', $category->slug)

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
    /* ======================== */
    /*     TRANG DANH MỤC      */
    /* ======================== */

    .category-page {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .category-page h1 {
        font-size: 32px;
        margin-bottom: 30px;
        color: #007bff;
        text-align: center;
    }

    /* Danh sách bài viết */
    .news-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* 1 hàng 3 bài */
        gap: 20px;
    }


    /* Bọc liên kết toàn bộ bài viết */
    .news-item-link {
        text-decoration: none;
        color: inherit;
        display: block;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .news-item-link:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    /* Item bài viết */
    .news-item {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
        transition: box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .news-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    /* Nội dung bài viết */
    .news-item-content {
        padding: 15px;
        flex-grow: 1;
    }

    .news-item-content h3 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #007bff;
    }

    .news-item-content p {
        font-size: 16px;
        color: #555;
        margin-bottom: 8px;
        line-height: 1.6;
    }

    @media (max-width: 992px) {
    .news-list {
        grid-template-columns: repeat(2, 1fr); /* Tablet: 2 bài / hàng */
    }
}

@media (max-width: 576px) {
    .news-list {
        grid-template-columns: 1fr; /* Mobile: 1 bài / hàng */
    }
}

</style>