@extends('layouts.layout')

@section('title', $news->title)

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
                    <label for="rating">Đánh giá bài viết :</label>
                    <div class="stars">
                        @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" required>
                            <label for="star{{ $i }}">★</label>
                        @endfor
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm Bình Luận</button>
            </form>
        </div>
        <div class="advertisement-section">
            <div id="advertisementCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/HOTNEWS360_banner1.gif') }}" class="d-block w-100" alt="Advertisement 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/banner30-4.jpg') }}" class="d-block w-100" alt="Advertisement 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/bannerphu.jpg') }}" class="d-block w-100" alt="Advertisement 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#advertisementCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#advertisementCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Các bài viết xem gần đây -->
        <div class="recent-articles">
            <h3>Các Bài Viết Xem Gần Đây</h3>
            <div class="recent-articles-list">
                @foreach($recentArticlesList as $recent)
                    <div class="recent-article-item">
                        <a href="{{ route('news.show', $recent->slug) }}">
                            <img src="{{ asset($recent->image) }}" alt="{{ $recent->title }}" class="recent-article-image">
                            <div class="recent-article-content">
                                <h4>{{ $recent->title }}</h4>
                                <p>{{ Str::limit($recent->content, 100) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    <!-- Phần aside hiển thị các bài viết từ các danh mục khác -->
    <div class="category-articles">
        <h3>Bài Viết Khác</h3>

        <!-- Biến đếm để theo dõi thứ tự danh mục -->
        @php $counter = 1; @endphp

        <!-- Hiển thị các danh mục -->
        @foreach($categories->take(3) as $category)
            <div class="category-item mb-4">
                <h4>{{ $category->name }}</h4>

                <!-- Các bài viết trong mỗi danh mục -->
                <div class="category-articles-list d-flex flex-wrap gap-3">
                    @foreach($category->news->take(3) as $article)
                        <div class="category-article-item">
                            <a href="{{ route('news.show', $article->slug) }}" class="text-decoration-none">
                                <div class="d-flex">
                                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="category-article-image" style="width: 120px; height: 80px; object-fit: cover; margin-right: 15px;">
                                    <div class="category-article-content">
                                        <h5>{{ Str::limit($article->title, 30) }}</h5>
                                        <p>{{ Str::limit($article->content, 50) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Quảng cáo dưới mỗi danh mục, thay đổi ảnh quảng cáo cho mỗi danh mục -->
                <div class="ad-space text-center my-3">
                    <p>Quảng cáo</p>
                    <div class="advertisement">
                        <!-- Quảng cáo cho danh mục với id động -->
                        @if($counter == 1)
                            <div class="ad-item">
                                <img src="{{ asset('images/banner2.gif') }}" alt="Advertisement" class="img-fluid">
                            </div>
                        @elseif($counter == 2)
                            <div class="ad-item">
                                <img src="{{ asset('images/banner30-4.jpg') }}" alt="Advertisement" class="img-fluid">
                            </div>
                        @elseif($counter == 3)
                            <div class="ad-item">
                                <img src="{{ asset('images/bannerphu.jpg') }}" alt="Advertisement" class="img-fluid">
                            </div>
                        @else
                            <!-- Quảng cáo mặc định cho các danh mục khác -->
                            <div class="ad-item">
                                <img src="{{ asset('images/HOTNEWS360_banner1.gif') }}" alt="Advertisement" class="img-fluid">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tăng biến đếm để gán ID cho danh mục tiếp theo -->
            @php $counter++; @endphp
        @endforeach
    </div>
@endsection

<style>
    /* Hiệu ứng hover cho các mục bài viết trong aside */
    .category-article-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .category-article-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .category-article-item img {
        transition: transform 0.3s ease;
    }

    /* Hiệu ứng hover cho ảnh trong bài viết sidebar */
    .category-article-item img:hover {
        transform: scale(1.1);
    }

    /* Các mục bài viết trong danh mục */
    .category-articles {
        margin-top: 30px;
        padding: 10px;
    }

    .category-item h4 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        transition: color 0.3s ease;
    }

    .category-item:hover {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .category-articles-list {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .category-article-item {
        flex: 1 0 calc(33% - 20px);
        background-color: #fff;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .category-article-item img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 15px;
    }

    .category-article-content {
        flex-grow: 1;
    }

    /* Các bài quảng cáo trong sidebar */
    .ad-item img {
        transition: transform 0.3s ease;
    }

    .ad-item img:hover {
        transform: scale(1.05);
    }
</style>




<style>
    .post-detail {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Tiêu đề bài viết */
    .post-header h1 {
        font-size: 36px;
        color: #007bff;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        /* Canh giữa tiêu đề */
    }

    /* Thông tin bài viết */
    .post-meta {
        font-size: 16px;
        color: #666;
        margin-bottom: 20px;
        text-align: center;
        /* Canh giữa thông tin bài viết */
    }

    .post-meta span {
        margin-right: 15px;
    }

    /* Nội dung bài viết */
    .post-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }

    .post-content image {
        width: 300px;
        height: 100px;
    }

    .post-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .post-image-placeholder {
        background-color: #f1f1f1;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        font-size: 18px;
        color: #666;
    }

    .content {
        font-size: 18px;
        line-height: 1.8;
        color: #333;
    }

    /* Phần bình luận */
    .post-comments {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }

    .post-comments h3 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .comment {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .comment p {
        font-size: 16px;
        color: #333;
        line-height: 1.5;
    }

    .comment-meta {
        font-size: 14px;
        color: #777;
    }

    /* ========== SAO HIỂN THỊ ĐÁNH GIÁ (trong bình luận) ========== */
    .star {
        font-size: 20px;
        color: #ccc;
        /* Sao chưa được đánh giá */
        display: inline-block;
    }

    .star.filled {
        color: #ffc107;
        /* Màu vàng cho sao đã đánh giá */
    }

    /* Form thêm bình luận */
    form {
        margin-top: 30px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    textarea.form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        resize: vertical;
    }

    /* ========== SAO CHỌN ĐÁNH GIÁ (trong form) ========== */
    .stars {
        display: flex;
        flex-direction: row-reverse;
        /* Hiển thị sao từ phải sang trái */
        justify-content: flex-start;
        gap: 5px;
    }

    .stars input[type="radio"] {
        display: none;
    }

    .stars label {
        font-size: 30px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.2s ease;
        user-select: none;
    }

    /* Hover sao */
    .stars label:hover,
    .stars label:hover~label {
        color: #ffcc00;
    }

    /* Khi chọn sao */
    .stars input[type="radio"]:checked~label {
        color: #ffc107;
    }

    /* Hover khi đã chọn */
    .stars input[type="radio"]:checked~label:hover,
    .stars input[type="radio"]:checked~label:hover~label {
        color: #ffcc00;
    }

    /* Button submit */
    button.btn.btn-primary {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button.btn.btn-primary:hover {
        background-color: #218838;
    }

    /* Các bài viết xem gần đây */
    .recent-articles {
        margin-top: 40px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .recent-articles h3 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .recent-articles-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* Hiển thị 3 bài viết mỗi hàng */
        gap: 20px;
    }

    .recent-article-item {
        background-color: #f9f9f9;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .recent-article-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .recent-article-content {
        padding: 15px;
    }

    .recent-article-content h4 {
        font-size: 20px;
        color: #007bff;
        margin-bottom: 10px;
    }

    /* Ẩn đường link */
    .recent-article-item a {
        text-decoration: none;
        /* Ẩn underline */
        color: inherit;
        /* Kế thừa màu sắc từ phần tử cha */
    }

    .recent-article-content p {
        font-size: 16px;
        color: #666;
        line-height: 1.5;
    }

    /* Responsive Design */
    @media (max-width: 768px) {

        /* Điều chỉnh các phần tử cho màn hình nhỏ */
        .post-header h1 {
            font-size: 28px;
        }

        .content {
            font-size: 16px;
        }

        .recent-articles-list {
            grid-template-columns: 1fr;
            /* Chuyển thành 1 cột trên màn hình nhỏ */
        }

        .comment p {
            font-size: 14px;
        }

        .comment-meta {
            font-size: 12px;
        }

        .stars label {
            font-size: 25px;
        }

        .recent-article-content h4 {
            font-size: 18px;
        }
    }
</style>
