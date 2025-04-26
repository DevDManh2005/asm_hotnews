@extends('layouts.layout')

@section('title', 'Kết quả tìm kiếm')

@section('noidung')
    <h1 class="text-center mb-4">Kết quả tìm kiếm cho: "{{ e($query) }}"</h1>

    @if($news->count() > 0)
        @foreach($news as $article)
            <div class="article-item mb-4 p-3 border rounded shadow-sm">
                <!-- Hiển thị tiêu đề bài viết -->
                <h2 class="article-title">
                    <a href="{{ route('news.show', $article->slug) }}" class="text-decoration-none text-primary">
                        <i class="bi bi-file-earmark-text"></i> {{ $article->title }}
                    </a>
                </h2>
                <!-- Hiển thị hình ảnh bài viết nếu có -->
                <div class="mb-3">
                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded">
                </div>
               
                <!-- Hiển thị phần tóm tắt nội dung -->
                <p class="article-excerpt">{{ Str::limit($article->content, 150) }}</p>

                <!-- Thêm thông tin ngày đăng -->
                <p class="article-date"><strong>Ngày đăng:</strong> {{ $article->created_at->format('d/m/Y') }}</p>

                <!-- Liên kết đọc thêm -->
                <a href="{{ route('news.show', $article->slug) }}" class="read-more text-decoration-none">
                    <i class="bi bi-arrow-right-circle"></i> Đọc thêm
                </a>
            </div>
        @endforeach

        <!-- Hiển thị phân trang khi có nhiều hơn 12 bài -->
        @if($news->count() > 12)
            <div class="pagination">
                {{ $news->links() }}
            </div>
        @endif
    @else
        <p>Không tìm thấy bài viết nào phù hợp với từ khóa "{{ e($query) }}"</p>
    @endif
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
                <h4 class="category-title">
                    <i class="bi bi-folder"></i> {{ $category->name }}
                </h4>

                <!-- Các bài viết trong mỗi danh mục -->
                <div class="category-articles-list d-flex flex-wrap gap-3">
                    @foreach($category->news->take(3) as $article)
                        <div class="category-article-item mb-3">
                            <a href="{{ route('news.show', $article->slug) }}" class="text-decoration-none">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="category-article-image rounded" style="width: 120px; height: 80px; object-fit: cover; margin-right: 15px;">
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
                        @if($counter == 1)
                            <div class="ad-item">
                                <img src="{{ asset('images/banner2.gif') }}" alt="Advertisement" class="img-fluid rounded">
                            </div>
                        @elseif($counter == 2)
                            <div class="ad-item">
                                <img src="{{ asset('images/banner30-4.jpg') }}" alt="Advertisement" class="img-fluid rounded">
                            </div>
                        @elseif($counter == 3)
                            <div class="ad-item">
                                <img src="{{ asset('images/bannerphu.jpg') }}" alt="Advertisement" class="img-fluid rounded">
                            </div>
                        @else
                            <div class="ad-item">
                                <img src="{{ asset('images/HOTNEWS360_banner1.gif') }}" alt="Advertisement" class="img-fluid rounded">
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
    /* Hiệu ứng hover cho các bài viết trong kết quả tìm kiếm */
    .article-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .article-item img:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }

    /* Hiệu ứng hover cho sidebar items */
    .category-article-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    /* Hover hiệu ứng cho tiêu đề bài viết */
    .article-title a {
        font-weight: bold;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .article-title a:hover {
        color: #0056b3;
    }

    /* Hiệu ứng hover cho bài viết sidebar */
    .category-title:hover {
        color: #007bff;
        cursor: pointer;
    }

    /* Quảng cáo */
    .ad-item img {
        transition: transform 0.3s ease;
    }

    .ad-item img:hover {
        transform: scale(1.05);
    }

    /* Cải thiện layout */
    .category-articles-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .category-article-item {
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .category-articles-list {
            flex-direction: column;
        }

        .category-article-item {
            flex: 1 0 100%;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
