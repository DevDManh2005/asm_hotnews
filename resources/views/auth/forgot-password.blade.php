@extends('layouts.layout')

@section('title', 'Quên Mật Khẩu')

@section('noidung')
<div class="forgot-password-container">
    <h1>Quên mật khẩu</h1>
    <form action="{{ route('password.request') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Nhập email của bạn" required>
        <button type="submit">Gửi liên kết đặt lại mật khẩu</button>
    </form>
</div>
@endsection
<style>
    /* 🌟 Container chính */
.forgot-password-container {
    max-width: 500px; /* Chiều rộng tối đa nhỏ gọn */
    margin: 40px auto; /* Căn giữa nội dung */
    padding: 30px;
    background: #fff; /* Nền trắng */
    border-radius: 15px; /* Bo tròn góc mềm mại */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center; /* Căn giữa nội dung */
}

/* 🌟 Tiêu đề lớn */
.forgot-password-container h1 {
    color: #007bff; /* Màu xanh dương đồng nhất */
    font-size: 36px;
    margin-bottom: 30px;
    font-weight: 700;
}

/* 🌟 Form quên mật khẩu */
.forgot-password-container form {
    display: flex;
    flex-direction: column;
    gap: 20px; /* Khoảng cách giữa các phần tử */
}

/* 🌟 Trường nhập liệu */
.forgot-password-container input[type="email"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px; /* Bo tròn góc mềm mại */
    font-size: 16px;
    transition: border-color 0.3s ease; /* Hiệu ứng mượt mà */
}

.forgot-password-container input[type="email"]:focus {
    border-color: #007bff; /* Viền xanh dương khi focus */
    outline: none; /* Loại bỏ viền mặc định */
}

/* 🌟 Nút gửi */
.forgot-password-container button {
    padding: 12px;
    background: #007bff; /* Màu xanh dương đồng nhất */
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px; /* Bo tròn góc mềm mại */
    cursor: pointer;
    transition: background 0.3s ease;
}

.forgot-password-container button:hover {
    background: #0056b3; /* Màu xanh dương đậm khi hover */
}

.forgot-password-container button:active {
    transform: scale(0.98); /* Thu nhỏ nút khi nhấn */
}

/* 🌟 Responsive Design */
@media (max-width: 768px) {
    .forgot-password-container {
        padding: 20px;
    }

    .forgot-password-container h1 {
        font-size: 30px;
    }

    .forgot-password-container input[type="email"] {
        font-size: 14px;
        padding: 10px;
    }

    .forgot-password-container button {
        font-size: 14px;
        padding: 10px;
    }
}
</style>