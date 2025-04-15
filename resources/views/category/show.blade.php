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
