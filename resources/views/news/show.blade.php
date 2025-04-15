@extends('layouts.layout')

@section('title', 'Chi Tiết Bài Viết - ' . $news->title)

@section('noidung')
    <div class="post-detail">
        <div class="post-header">
            <h1>{{ $news->title }}</h1>
            <p class="post-meta">
                <span>Đăng ngày: {{ $news->created_at->format('d/m/Y') }}</span>
                <span>Danh mục: <a href="{{ route('category.show', $news->category->slug) }}">{{ $news->category->name }}</a></span>
                <span>Lượt xem: {{ $news->views }}</span>
            </p>
        </div>

        <div class="post-content">
            @if ($news->image)
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="post-image">
            @else
                <div class="post-image-placeholder">Không có hình ảnh</div>
            @endif
            <div class="content">
                {!! $news->content !!}
            </div>
        </div>

        <!-- Phần bình luận -->
        <div class="post-comments">
            <h3>Bình luận</h3>

            <!-- Hiển thị các bình luận -->
            @if($comments->count() > 0)
                @foreach ($comments as $comment)
                    <div class="comment">
                        <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                        <p class="comment-meta">Đánh giá: 
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="star{{ $i <= $comment->rating ? ' filled' : '' }}">★</span>
                            @endfor
                        </p>
                        <p class="comment-meta">Đăng lúc: {{ $comment->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                @endforeach
            @else
                <p>Chưa có bình luận nào.</p>
            @endif

            <!-- Form thêm bình luận -->
            <form action="{{ route('comments.store', $news->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="4" placeholder="Viết bình luận..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Đánh giá bài viết (1-5 sao):</label>
                    <div class="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" required>
                            <label for="star{{ $i }}">☆</label>
                        @endfor
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm Bình Luận</button>
            </form>
        </div>
    </div>
@endsection
