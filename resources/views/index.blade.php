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
        <h2>Bài Viết Hot Nhất</h2>
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

