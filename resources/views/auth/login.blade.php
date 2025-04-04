@extends('layouts.layout')

@section('title', 'Đăng Nhập')

@section('noidung')
<div class="login-container">
    <h1>Đăng nhập</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button type="submit">Đăng nhập</button>
    </form>
    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
</div>
@endsection
<style>
    /* 🌟 Container chính */
.login-container {
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
.login-container h1 {
    color: #007bff; /* Màu xanh dương đồng nhất */
    font-size: 36px;
    margin-bottom: 30px;
    font-weight: 700;
}

/* 🌟 Form đăng nhập */
.login-container form {
    display: flex;
    flex-direction: column;
    gap: 20px; /* Khoảng cách giữa các phần tử */
}

/* 🌟 Trường nhập liệu */
.login-container input[type="email"],
.login-container input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px; /* Bo tròn góc mềm mại */
    font-size: 16px;
    transition: border-color 0.3s ease; /* Hiệu ứng mượt mà */
}

.login-container input[type="email"]:focus,
.login-container input[type="password"]:focus {
    border-color: #007bff; /* Viền xanh dương khi focus */
    outline: none; /* Loại bỏ viền mặc định */
}

/* 🌟 Nút đăng nhập */
.login-container button {
    padding: 12px;
    background: #007bff; /* Màu xanh dương đồng nhất */
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px; /* Bo tròn góc mềm mại */
    cursor: pointer;
    transition: background 0.3s ease;
}

.login-container button:hover {
    background: #0056b3; /* Màu xanh dương đậm khi hover */
}

.login-container button:active {
    transform: scale(0.98); /* Thu nhỏ nút khi nhấn */
}

/* 🌟 Liên kết quên mật khẩu */
.login-container a {
    display: block;
    margin-top: 15px;
    font-size: 14px;
    color: #007bff; /* Màu xanh dương đồng nhất */
    text-decoration: none;
    transition: color 0.3s ease;
}

.login-container a:hover {
    color: #0056b3; /* Màu xanh dương đậm khi hover */
}

/* 🌟 Responsive Design */
@media (max-width: 768px) {
    .login-container {
        padding: 20px;
    }

    .login-container h1 {
        font-size: 30px;
    }

    .login-container input[type="email"],
    .login-container input[type="password"] {
        font-size: 14px;
        padding: 10px;
    }

    .login-container button {
        font-size: 14px;
        padding: 10px;
    }

    .login-container a {
        font-size: 13px;
    }
}
</style>