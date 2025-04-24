@extends('layouts.layout')

@section('title', 'Kết quả tìm kiếm')

@section('content')
    <h1>Kết quả tìm kiếm cho: "{{ $query }}"</h1>

    @if($news->count() > 0)
        @foreach($news as $article)
            <div class="article-item">
                <h2 class="article-title">{{ $article->title }}</h2>
                <p class="article-excerpt">{{ Str::limit($article->content, 150) }}</p>
                <a href="{{ route('news.show', $article->slug) }}" class="read-more">Đọc thêm</a>
            </div>
        @endforeach

        <!-- Hiển thị phân trang -->
        <div class="pagination">
            {{ $news->links() }}
        </div>
    @else
        <p>Không tìm thấy bài viết nào phù hợp với từ khóa "{{ $query }}"</p>
    @endif
@endsection




<style>
    /* Kết quả tìm kiếm */
h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}

.article-item {
    background-color: #fff;
    padding: 20px;
    margin-bottom: 20px;
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

</style>