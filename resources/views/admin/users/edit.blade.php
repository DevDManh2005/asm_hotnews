@extends('admin.layout.admin')
@section('title', 'Chỉnh Sửa Người Dùng')
@section('content')
<div class="container-users-edit">
    <h1>Chỉnh Sửa Người Dùng</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Tên</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label for="full_name">Họ và Tên</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label for="role">Vai trò</label>
            <select name="role" id="role" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div>
            <label for="gender">Giới tính</label>
            <select name="gender" id="gender" required>
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Khác</option>
            </select>
        </div>

        <div>
            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}">
        </div>

        <div>
            <label for="avatar">Avatar</label>
            <input type="file" id="avatar" name="avatar">
            @if($user->avatar)
                <img src="{{ asset('images/' . $user->avatar) }}" alt="avatar" width="50">
            @else
                <span>No avatar</span>
            @endif
        </div>

        <!-- Thêm phần thay đổi mật khẩu -->
        <div>
            <label for="password">Mật khẩu mới</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Xác nhận mật khẩu mới</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div>
            <button type="submit">Cập nhật</button>
        </div>
    </form>
</div>
@endsection
<style>
    /* Container chính của phần Chỉnh Sửa Người Dùng */
.container-users-edit {
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

/* Tiêu đề trang */
.container-users-edit h1 {
    font-size: 2em;
    color: #2d3e50;
    margin-bottom: 30px;
    font-weight: 600;
}

/* Thông báo thành công */
.container-users-edit > div {
    padding: 15px;
    background-color: #27ae60;
    color: #fff;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 1.1em;
    font-weight: 500;
}

/* Các nhóm form */
.container-users-edit div {
    margin-bottom: 20px;
}

/* Nhãn của các trường nhập liệu */
.container-users-edit label {
    font-size: 1.1em;
    color: #34495e;
    margin-bottom: 10px;
    display: inline-block;
}

/* Các trường nhập liệu */
.container-users-edit input,
.container-users-edit select {
    width: 100%;
    padding: 12px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f7f7f7;
    transition: border 0.3s ease;
}

.container-users-edit input:focus,
.container-users-edit select:focus {
    border-color: #3498db; /* Màu sáng khi focus vào các input, select */
    outline: none;
}

/* Hiển thị avatar */
.container-users-edit img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
}
   
/* Nút bấm Cập Nhật */
.container-users-edit button {
    background-color: #1abc9c;
    color: #fff;
    padding: 12px 25px;
    font-size: 1.1em;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%; /* Nút chiếm toàn bộ chiều rộng */
}

.container-users-edit button:hover {
    background-color: #16a085; /* Màu nút khi hover */
}

/* Cải thiện bố cục form */
.container-users-edit form {
    display: flex;
    flex-direction: column;
}

/* Khoảng cách giữa các phần tử trong form */
.container-users-edit div input,
.container-users-edit div select,
.container-users-edit div button {
    margin-bottom: 20px; /* Thêm khoảng cách dưới mỗi trường */
}

/* Các phần nhập liệu mật khẩu */
.container-users-edit input[type="password"] {
    font-size: 1em;
    padding: 12px;
    border-radius: 8px;
    background-color: #f7f7f7;
    border: 1px solid #ccc;
}

/* Cải thiện độ tương phản */
.container-users-edit form {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Giữa các phần tử trong form */
}

</style>