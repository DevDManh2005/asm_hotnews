@extends('admin.layout.admin')
@section('title', 'Quản Lý Bài Viết')
@section('content')
    <div class="container-news">
        <h1>Quản Lý Bài Viết</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Nút thêm bài viết mới -->
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Thêm Bài Viết</a>

        <!-- Bảng hiển thị bài viết -->
        <table class="news-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu Đề</th>
                    <th>Danh Mục</th>
                    <th>Hình Ảnh</th>
                    <th>Nội Dung</th>
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
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="news-image" style="width: 100px; height: auto;">
                            @else
                                <span>Không có hình ảnh</span>
                            @endif
                        </td>

                        <!-- Hiển thị nội dung bài viết (nếu cần) -->
                        <td>{!! \Str::limit($item->content, 50) !!}</td> <!-- Hiển thị một phần của nội dung -->

                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>

                        <td>
                            <!-- Chỉnh sửa bài viết -->
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-edit">Sửa</a>

                            <!-- Xóa bài viết -->
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    /* Container chính của phần Quản Lý Bài Viết */
.container-news {
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

/* Tiêu đề của trang */
.container-news h1 {
    font-size: 2em;
    color: #000000;
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

/* Nút thêm bài viết mới */
.btn {
    background-color: #1abc9c;
    color: #fff;
    padding: 12px 25px;
    text-decoration: none;
    border-radius: 8px;
    font-size: 1.1em;
    transition: background-color 0.3s ease;
    margin-bottom: 20px;
    display: inline-block;
}

.btn:hover {
    background-color: #16a085;
}

/* Bảng hiển thị bài viết */
.news-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 30px;
}

.news-table th,
.news-table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 1em;
    color: #000000;
}

.news-table th {
    background-color: #ecf0f1;
    color: #000000;
    font-weight: bold;
}

.news-table td {
    background-color: #fff;
}

/* Hiển thị hình ảnh bài viết */
.news-image {
    width: 100px; /* Kích thước hình ảnh lớn hơn */
    height: 100px;
    object-fit: cover;
    border-radius: 6px;
}

/* Nút chỉnh sửa và xóa */
.btn-edit,
.btn-delete {
    background-color: #46e6ab;
    color: #fff;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.9em;
    transition: background-color 0.3s ease;
    margin-right: 10px; /* Khoảng cách giữa các nút */
    display: inline-block;
    text-align: center;
}

.btn-edit:hover,
.btn-delete:hover {
    background-color: #30eed1;
}

/* Nút xóa */
.btn-delete {
    background-color: #f35543;
}

.btn-delete:hover {
    background-color: #645250;
}

/* Form xóa bài viết */
form {
    display: inline;
}

/* Cải thiện khả năng cuộn khi bảng dài */
.news-table {
    overflow-x: auto;
}

</style>