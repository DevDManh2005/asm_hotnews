@extends('admin.layout.admin') <!-- Kế thừa layout admin của bạn -->

@section('content')
<div class="container">
    <h1 class="mb-4">Quản Lý Bài Viết</h1>

    <!-- Thông báo thành công khi thêm, sửa, xóa bài viết -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Nút thêm bài viết mới -->
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-4">Thêm Bài Viết</a>

    <!-- Bảng hiển thị bài viết -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Danh Mục</th>
                <th>Hình Ảnh</th>
                <th>Ngày Đăng</th>
                <th>Thời Gian Cập Nhật</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name }}</td>

                    <!-- Hiển thị hình ảnh bài viết -->
                    <td>
                        @if ($item->image)
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <span>Không có hình ảnh</span>
                        @endif
                    </td>
                    
                    <!-- Hiển thị ngày đăng -->
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>

                    <!-- Hiển thị thời gian cập nhật -->
                    <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>

                    <td>
                        <!-- Chỉnh sửa bài viết -->
                        <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning">Sửa</a>

                        <!-- Xóa bài viết -->
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
