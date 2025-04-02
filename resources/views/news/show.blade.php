@extends('layouts.layout')

@section('title', 'Chi Tiết Bài Viết - ' . $news->title)

@section('noidung')
    <div class="post-detail">
        <!-- Tiêu đề và thông tin bài viết -->
        <div class="post-header">
            <h1>{{ $news->title }}</h1>
            <p class="post-meta">
                <span>Đăng ngày: {{ $news->created_at->format('d/m/Y') }}</span>
                <span>Danh mục: <a href="{{ route('category.show', $news->category->slug) }}">{{ $news->category->name }}</a></span>

            </p>
        </div>

        <!-- Nội dung bài viết -->
        <div class="post-content">
            @if ($news->image)
                <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $news->title }}" class="post-image">
            @else
                <div class="post-image-placeholder"></div> <!-- Hiển thị placeholder nếu không có ảnh -->
            @endif
            <div class="content">
                {!! $news->content !!}
            </div>
        </div>

        <!-- Bình luận -->
        <div class="post-comments">
            <h3>Bình luận</h3>
            @foreach ($news->comments as $comment)
                <div class="comment">
                    <p><strong>{{ $comment->author }}</strong> ({{ $comment->created_at->format('d/m/Y') }})</p>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>

        <!-- Form thêm bình luận -->
        <div class="comment-form">
            <h3>Thêm Bình Luận</h3>
            <form action="{{ route('comments.store', $news->slug) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="content" rows="4" placeholder="Viết bình luận của bạn..." required></textarea>
                </div>
                <button type="submit">Gửi Bình Luận</button>
            </form>
        </div>
    </div>
@endsection

<style>
   /* 🌟 Chi Tiết Bài Viết */
.post-detail {
    max-width: 1200px;
    margin: 40px auto;
    background-color: #fff; /* Nền trắng */
    padding: 30px; /* Padding rộng hơn */
    border-radius: 15px; /* Bo tròn góc mềm mại */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* 🌟 Tiêu đề và thông tin bài viết */
.post-header {
    margin-bottom: 30px;
    border-bottom: 2px solid #f1f1f1; /* Viền nhạt phân cách */
    padding-bottom: 20px;
}

.post-header h1 {
    font-size: 36px;
    color: #1e3a8a; /* Màu xanh biển */
    font-weight: 700;
    margin-bottom: 15px;
}

.post-meta {
    font-size: 16px;
    color: #555; /* Màu chữ nhạt */
    display: flex;
    justify-content: flex-start;
    gap: 20px;
    flex-wrap: wrap;
}

.post-meta span {
    margin-right: 20px;
}

.post-meta a {
    color: #ff9800; /* Màu cam cho danh mục */
    text-decoration: none;
    transition: color 0.3s ease;
}

.post-meta a:hover {
    color: #e65100; /* Màu cam đậm khi hover */
}

/* 🌟 Nội dung bài viết */
.post-content {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

/* 🌟 Hình ảnh bài viết */
.post-image,
.post-image-placeholder {
    width: 100%;
    height: 400px; /* Kích thước ảnh cố định */
    border-radius: 12px; /* Bo tròn góc mềm mại hơn */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
}

.post-image-placeholder {
    background-color: #f1f1f1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #888;
    text-align: center;
}

.post-image:hover {
    transform: scale(1.05); /* Phóng to hình ảnh khi hover */
}

/* 🌟 Nội dung bài viết */
.content {
    font-size: 18px;
    line-height: 1.8; /* Chiều cao dòng thoải mái */
    color: #333; /* Màu chữ tối hơn để dễ đọc */
    text-align: justify;
}

/* 🌟 Bình luận */
.post-comments {
    margin-top: 40px;
}

.post-comments h3 {
    font-size: 28px;
    color: #1e3a8a; /* Màu xanh biển */
    margin-bottom: 25px;
    font-weight: 700;
}

.comment {
    background-color: #fafafa; /* Nền nhạt */
    border-left: 5px solid #ff9800; /* Viền cam */
    padding: 20px;
    margin-bottom: 25px;
    border-radius: 10px; /* Bo tròn góc mềm mại */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.comment:hover {
    transform: translateX(10px); /* Di chuyển nhẹ khi hover */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
}

.comment p {
    font-size: 15px;
    color: #555; /* Màu chữ nhạt */
    margin: 5px 0;
}

.comment strong {
    font-weight: bold;
    color: #1e3a8a; /* Màu xanh biển */
}

/* 🌟 Form bình luận */
.comment-form {
    margin-top: 40px;
    background-color: #f9f9f9; /* Nền nhạt */
    padding: 25px;
    border-radius: 12px; /* Bo tròn góc mềm mại */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Bóng đổ mờ */
}

.comment-form .form-group {
    margin-bottom: 20px;
}

.comment-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px; /* Bo tròn góc mềm mại */
    border: 1px solid #ddd;
    resize: vertical;
    font-size: 16px;
    color: #333;
    transition: border 0.3s ease;
}

.comment-form textarea:focus {
    border-color: #ff9800; /* Viền cam khi focus */
    outline: none; /* Loại bỏ viền mặc định */
}

.comment-form button {
    padding: 12px 25px;
    background-color: #ff9800; /* Màu cam */
    color: white;
    border: none;
    border-radius: 8px; /* Bo tròn góc mềm mại */
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.comment-form button:hover {
    background-color: #e65100; /* Màu cam đậm khi hover */
}

.comment-form button:active {
    transform: scale(0.98); /* Thu nhỏ nút khi nhấn */
}

/* 🌟 Responsive Design */
@media (max-width: 1024px) {
    .post-detail {
        padding: 20px;
    }

    .post-header h1 {
        font-size: 30px;
    }

    .post-meta {
        font-size: 14px;
    }

    .content {
        font-size: 16px;
    }
}

@media (max-width: 768px) {
    .post-detail {
        padding: 15px;
    }

    .post-header h1 {
        font-size: 26px;
    }

    .content {
        font-size: 14px;
    }

    .comment-form button {
        font-size: 14px;
        padding: 10px 20px;
    }
}
</style>
