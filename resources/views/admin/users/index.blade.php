@extends('admin.layout.admin')
@section('title', 'Danh Sách Người Dùng')
@section('content')
<div class="container-users">
    <h1>Danh Sách Người Dùng</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.users.create') }}">Thêm Người Dùng</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Avatar</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->full_name }}</td> <!-- Hiển thị full_name thay vì name -->
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>{{ ucfirst($user->gender) }}</td> <!-- Hiển thị giới tính -->
                    <td>{{ $user->address ?? 'Chưa có địa chỉ' }}</td> <!-- Hiển thị địa chỉ -->
                    <td>
                        @if($user->avatar)
                            <img src="{{ asset('images/' . $user->avatar) }}" alt="avatar" width="50">
                        @else
                            <span>No avatar</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}">Chỉnh sửa</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Thêm phân trang nếu cần -->
    {{ $users->links() }}
</div>
@endsection
<style>
    /* Container chính của phần Danh Sách Người Dùng */
.container-users {
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề của trang */
.container-users h1 {
    font-size: 2em;
    color: #2d3e50;
    margin-bottom: 30px;
    font-weight: 600;
}

/* Thông báo thành công */
.container-users > div {
    padding: 15px;
    background-color: #27ae60;
    color: #fff;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 1.1em;
    font-weight: 500;
}

/* Nút thêm người dùng mới */
.container-users a {
    background-color: #1abc9c;
    color: #fff;
    padding: 12px 25px;
    text-decoration: none;
    border-radius: 8px;
    font-size: 1.1em;
    display: inline-block;
    margin-bottom: 20px;
    transition: background-color 0.3s ease;
}

.container-users a:hover {
    background-color: #16a085;
}

/* Bảng hiển thị danh sách người dùng */
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

/* Các liên kết chỉnh sửa */
table a {
    color: #3498db;
    text-decoration: none;
    font-size: 1em;
    transition: background-color 0.3s ease;
    margin-right: 10px;
    padding: 8px 16px;
    border-radius: 6px;
    background-color: #3498db; /* Màu xanh cho nút Sửa */
}

table a:hover {
    background-color: #2980b9; /* Màu khi hover */
}

/* Các nút xóa */
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

/* Hình ảnh avatar */
table img {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
}

/* Form xóa người dùng */
form {
    display: inline;
}

/* Cải thiện khả năng cuộn khi bảng dài */
table {
    overflow-x: auto;
}

/* Phân trang người dùng */
.container-users > .pagination {
    text-align: center;
    margin-top: 20px;
}

.container-users .pagination a {
    color: #3498db;
    font-size: 1em;
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 6px;
    margin: 0 5px;
}

.container-users .pagination a:hover {
    background-color: #3498db;
    color: #fff;
}

.container-users .pagination .disabled {
    color: #ccc;
    pointer-events: none;
}

</style>