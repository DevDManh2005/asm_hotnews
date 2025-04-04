@extends('layouts.layout')

@section('title', 'Đăng Ký')

@section('noidung')
<div class="register-container">
    <h1>Đăng ký</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Tên" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
        <button type="submit">Đăng ký</button>
    </form>
</div>
@endsection
<style>
    /* 🌟 Container chính */
.register-container {
    max-width: 400px; /* Chiều rộng tối đa nhỏ gọn */
    margin: 40px auto; /* Căn giữa nội dung */
    padding: 30px;
    background: #fff; /* Nền trắng */
    border-radius: 15px; /* Bo tròn góc mềm mại */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center; /* Căn giữa nội dung */
}

/* 🌟 Tiêu đề lớn */
.register-container h1 {
    color: #007bff; /* Màu xanh dương đồng nhất */
    font-size: 36px;
    margin-bottom: 30px;
    font-weight: 700;
}

/* 🌟 Form đăng ký */
.register-container form {
    display: flex;
    flex-direction: column;
    gap: 20px; /* Khoảng cách giữa các phần tử */
}

/* 🌟 Trường nhập liệu */
.register-container input[type="text"],
.register-container input[type="email"],
.register-container input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px; /* Bo tròn góc mềm mại */
    font-size: 16px;
    transition: border-color 0.3s ease; /* Hiệu ứng mượt mà */
}

.register-container input[type="text"]:focus,
.register-container input[type="email"]:focus,
.register-container input[type="password"]:focus {
    border-color: #007bff; /* Viền xanh dương khi focus */
    outline: none; /* Loại bỏ viền mặc định */
}

/* 🌟 Nút đăng ký */
.register-container button {
    padding: 12px;
    background: #007bff; /* Màu xanh dương đồng nhất */
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px; /* Bo tròn góc mềm mại */
    cursor: pointer;
    transition: background 0.3s ease;
}

.register-container button:hover {
    background: #0056b3; /* Màu xanh dương đậm khi hover */
}

.register-container button:active {
    transform: scale(0.98); /* Thu nhỏ nút khi nhấn */
}

/* 🌟 Responsive Design */
@media (max-width: 768px) {
    .register-container {
        padding: 20px;
    }

    .register-container h1 {
        font-size: 30px;
    }

    .register-container input[type="text"],
    .register-container input[type="email"],
    .register-container input[type="password"] {
        font-size: 14px;
        padding: 10px;
    }

    .register-container button {
        font-size: 14px;
        padding: 10px;
    }
}
</style>