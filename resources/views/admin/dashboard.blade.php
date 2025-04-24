@extends('admin.layout.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="dashboard-stats">
        <div class="stat-item">
            <h3>Tổng số bài viết</h3>
            <p>{{ $totalNews }}</p>
        </div>
        <div class="stat-item">
            <h3>Tổng số người dùng</h3>
            <p>{{ $totalUsers }}</p>
        </div>
        <div class="stat-item">
            <h3>Tổng lượt xem</h3>
            <p>{{ $totalViews }}</p>
        </div>
    </div>

    <div class="top-news">
        <h3>Bài viết có lượt xem nhiều nhất</h3>
        <ul>
            @foreach($topNews as $news)
                <li>
                    <span class="title">
                        <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
                    </span>
                    <span class="views">{{ $news->views }} lượt xem</span>
                </li>
            @endforeach
        </ul>
    </div>
    
    <div class="recent-comments">
        <h3>Bình luận mới nhất</h3>
        <ul>
            @foreach($recentComments as $comment)
                <li>
                    <span class="user"><strong>{{ $comment->user->name ?? 'Anonymous' }}:</strong></span>
                    <span class="content">
                        <a href="{{ route('news.show', $comment->news->slug) }}">
                            {{ $comment->content }} - Bài viết: {{ $comment->news->title }}
                        </a>
                    </span>
                    <span class="created-at">{{ $comment->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    
@endsection
<style>
    /* Phần tử Dashboard Stats */
.dashboard-stats {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
    gap: 20px;
}

.stat-item {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    flex: 1;
    text-align: center;
}

.stat-item h3 {
    font-size: 1.4em;
    color: #34495e;
    margin-bottom: 10px;
}

.stat-item p {
    font-size: 2em;
    font-weight: bold;
    color: #3498db; /* Màu sáng và dễ nhìn cho các thống kê */
}

/* Phần tử Top News */
.top-news {
    margin-bottom: 30px;
}

.top-news h3 {
    font-size: 1.6em;
    color: #2c3e50;
    margin-bottom: 20px;
}

.top-news ul {
    list-style: none;
    padding: 0;
}

.top-news ul li {
    background-color: #fff;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.top-news .title a {
    color: #3498db;
    text-decoration: none;
    font-size: 1.1em;
    transition: color 0.3s ease;
}

.top-news .title a:hover {
    color: #2980b9;
}

.top-news .views {
    font-size: 1em;
    color: #7f8c8d;
}

/* Phần tử Recent Comments */
.recent-comments h3 {
    font-size: 1.6em;
    color: #2c3e50;
    margin-bottom: 20px;
}

.recent-comments ul {
    list-style: none;
    padding: 0;
}

.recent-comments ul li {
    background-color: #fff;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.recent-comments .user {
    font-weight: bold;
    color: #2c3e50;
}

.recent-comments .content {
    font-size: 1.1em;
    color: #34495e;
}

.recent-comments .content a {
    color: #3498db;
    text-decoration: none;
}

.recent-comments .content a:hover {
    color: #2980b9;
}

.recent-comments .created-at {
    font-size: 0.85em;
    color: #7f8c8d;
    margin-top: 10px;
    display: block;
}

</style>