@extends('admin.layout.admin')
@section('title', 'Quản Lý Danh Mục')
@section('content')
<div class="container-categories">
    <h1>Quản Lý Danh Mục</h1>

    <!-- Thông báo thành công khi thêm, sửa, xóa danh mục -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Nút thêm danh mục mới -->
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm Danh Mục</a>

    <!-- Bảng hiển thị danh mục -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Slug</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <!-- Chỉnh sửa danh mục -->
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-edit">Sửa</a>
                        
                        <!-- Xóa danh mục -->
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
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
    /* Container chính của phần Quản Lý Danh Mục */
.container-categories {
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề của trang */
.container-categories h1 {
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

/* Nút thêm danh mục mới */
.container-categories a {
    background-color: #1abc9c;
    color: #fff;
    padding: 12px 25px;
    text-decoration: none;
    border-radius: 8px;
    font-size: 1.1em;
    display: inline-block;
    margin-bottom: 20px;
    transition: background-color 0.3s ease;
    margin-right: 15px;
}

.container-categories a:hover {
    background-color: #16a085;
}

/* Bảng hiển thị danh mục */
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

/* Các liên kết chỉnh sửa và xóa */
table a,
form button {
    color: #fff;
    text-decoration: none;
    font-size: 1em;
    transition: background-color 0.3s ease;
    margin-right: 10px;
    padding: 8px 16px; /* Điều chỉnh padding cho nút */
    border-radius: 6px;
    display: inline-block; /* Đảm bảo nút và liên kết có kiểu giống nhau */
    text-align: center; /* Căn giữa nội dung trong nút */
    font-weight: 600;
}

/* Nút Sửa */
table a {
    background-color: #3498db; /* Màu xanh cho nút Sửa */
}

table a:hover {
    background-color: #2980b9; /* Màu khi hover */
}

/* Nút Xóa */
button {
    background-color: #e74c3c;
    color: #fff;
    padding: 8px 16px; /* Tăng padding để nút dễ nhận diện */
    border-radius: 6px;
    border: none;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #c0392b; /* Màu khi hover */
}

/* Form xóa danh mục */
form {
    display: inline;
}

/* Cải thiện khả năng cuộn khi bảng dài */
table {
    overflow-x: auto;
}

/* Thêm khoảng cách giữa các phần tử trong bảng và nút */
.container-categories a,
form button {
    margin-top: 15px; /* Tạo khoảng cách giữa các nút */
    margin-right: 10px; /* Khoảng cách giữa các nút */
}

</style>