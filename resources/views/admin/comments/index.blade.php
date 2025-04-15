@extends('admin.layout.admin') <!-- Kế thừa layout admin của bạn -->

@section('content')
<div class="container">
    <h1 class="mb-4">Quản Lý Bình Luận</h1>

    <!-- Thông báo thành công khi xóa bình luận -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bảng hiển thị bình luận -->
    <table class="table table-bordered">
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
                    <td>{{ $comment->news->title }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->rating }} sao</td>
                    <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>

                    <td>
                        <!-- Xóa bình luận -->
                        <form action="{{ route('admin.comments.delete', $comment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang bình luận -->
    <div class="d-flex justify-content-center">
        {{ $comments->links() }}
    </div>
</div>
@endsection
