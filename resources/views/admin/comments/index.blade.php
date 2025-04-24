@extends('admin.layout.admin') <!-- Kế thừa layout admin của bạn -->
@section('title', 'Quản Lý Bình Luận') <!-- Tiêu đề trang -->
@section('content')
    <div class="container-comments"> <!-- Container chứa nội dung quản lý bình luận -->
        <h1>Quản Lý Bình Luận</h1>

        <!-- Thông báo thành công khi xóa bình luận -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Bảng hiển thị bình luận -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bài Viết</th>
                    <th>Người Dùng</th>
                    <th>Nội Dung</th>
                    <th>Đánh Giá</th>
                    <th>Ngày Đăng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td> <a href="{{ route('news.show', $comment->news->slug) }}">
                                {{ $comment->news->title }}
                            </a></td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->rating }} sao</td>
                        <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>

                        <td>
                            <!-- Xóa bình luận -->
                            <form action="{{ route('admin.comments.delete', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang bình luận -->
        <div>
            {{ $comments->links() }}
        </div>
    </div>
@endsection
<style>
    /* Container chính của phần Quản Lý Bình Luận */
    .container-comments {
        padding: 30px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    /* Tiêu đề của trang */
    .container-comments h1 {
        font-size: 2em;
        color: #2d3e50;
        margin-bottom: 30px;
        font-weight: 600;
    }

    /* Thông báo thành công */
    .alert {
        padding: 15px;
        background-color: #27ae60;
        color: #fff;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 1.1em;
        font-weight: 500;
    }

    /* Bảng hiển thị bình luận */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 30px;
    }

    table th,
    table td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        font-size: 1em;
        color: #34495e;
    }

    table th {
        background-color: #ecf0f1;
        color: #2c3e50;
        font-weight: bold;
    }

    table td {
        background-color: #fff;
    }

    /* Các nút xóa bình luận */
    button {
        background-color: #e74c3c;
        color: #fff;
        padding: 8px 16px;
        border-radius: 6px;
        border: none;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #c0392b;
    }

    /* Hiệu ứng hover cho các liên kết và nút */
    table a {
        color: #3498db;
        text-decoration: none;
        font-size: 1em;
        transition: color 0.3s ease;
        margin-right: 10px;
    }

    table a:hover {
        color: #2980b9;
    }

    /* Phân trang bình luận */
    .container-comments>div {
        margin-top: 20px;
        text-align: center;
    }

    .container-comments .pagination {
        display: inline-block;
        padding: 10px 0;
    }

    .container-comments .pagination a {
        color: #3498db;
        font-size: 1em;
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 6px;
        margin: 0 5px;
    }

    .container-comments .pagination a:hover {
        background-color: #3498db;
        color: #fff;
    }

    .container-comments .pagination .disabled {
        color: #ccc;
        pointer-events: none;
    }
</style>