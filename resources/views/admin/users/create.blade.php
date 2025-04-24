@extends('admin.layout.admin')
@section('title', 'Thêm Người Dùng')
@section('content')
    <div class="container-users-create">
        <h1>Thêm Người Dùng</h1>

        <!-- Hiển thị thông báo lỗi nếu có -->
        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Tên Người Dùng</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            
            <div>
                <label for="full_name">Họ và Tên</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
            </div>
        
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
        
            <div>
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>
            </div>
        
            <div>
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
        
            <div>
                <label for="role">Vai trò</label>
                <select id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
        
            <div>
                <label for="avatar">Avatar</label>
                <input type="file" id="avatar" name="avatar" accept="image/*">
            </div>
        
            <div>
                <label for="gender">Giới tính</label>
                <select id="gender" name="gender" required>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                    <option value="other">Khác</option>
                </select>
            </div>
        
            <div>
                <label for="address">Địa chỉ</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}">
            </div>
        
            <button type="submit">Thêm Người Dùng</button>
        </form>
        
    </div>
@endsection

<style>
    /* Container chính của phần Thêm Người Dùng */
.container-users-create {
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

/* Tiêu đề trang */
.container-users-create h1 {
    font-size: 2em;
    color: #2d3e50;
    margin-bottom: 30px;
    font-weight: 600;
}

/* Hiển thị thông báo lỗi */
.container-users-create .error-message {
    padding: 15px;
    background-color: #ff0000;
    color: #fff;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 1.1em;
    font-weight: 500;
}

/* Các nhóm form */
.container-users-create div {
    margin-bottom: 20px;
}

/* Nhãn của các trường nhập liệu */
.container-users-create label {
    font-size: 1.1em;
    color: #34495e;
    margin-bottom: 10px;
    display: inline-block;
}

/* Các trường nhập liệu */
.container-users-create input,
.container-users-create select {
    width: 100%;
    padding: 12px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f7f7f7;
    transition: border 0.3s ease;
}

.container-users-create input:focus,
.container-users-create select:focus {
    border-color: #3498db; /* Màu sáng khi focus vào các input, select */
    outline: none;
}

/* Nút bấm Thêm Người Dùng */
button {
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

button:hover {
    background-color: #16a085; /* Màu nút khi hover */
}

/* Cải thiện bố cục form */
.container-users-create form {
    display: flex;
    flex-direction: column;
}

/* Khoảng cách giữa các phần tử trong form */
.container-users-create div input,
.container-users-create div select,
.container-users-create div button {
    margin-bottom: 20px; /* Thêm khoảng cách dưới mỗi trường */
}

/* Các phần nhập liệu mật khẩu */
.container-users-create input[type="password"] {
    font-size: 1em;
    padding: 12px;
    border-radius: 8px;
    background-color: #f7f7f7;
    border: 1px solid #ccc;
}

/* Hình ảnh avatar */
.container-users-create img {
    border-radius: 50%; /* Bo tròn hình ảnh */
    margin-top: 10px;
}

/* Cải thiện độ tương phản */
.container-users-create form {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Giữa các phần tử trong form */
}

</style>