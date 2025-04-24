@extends('layouts.layout')

@section('title', 'Tài Khoản')

@section('noidung')
<div class="profile-container">
    <h1>Quản Lý Tài Khoản</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Sử dụng PUT để cập nhật dữ liệu -->

        <!-- Tên người dùng -->
        <div>
            <label for="name" class="form-label">Tên Người Dùng</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <!-- Avatar -->
        <div>
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">

            <!-- Hiển thị avatar hiện tại nếu có -->
            @if($user->avatar)
                <div>
                    <p>Avatar hiện tại:</p>
                    <img src="{{ asset('images/' . $user->avatar) }}" alt="avatar" width="100">
                    <p><small>Chọn ảnh mới nếu bạn muốn thay đổi avatar.</small></p>
                </div>
            @else
                <p><small>Hiện tại bạn chưa có avatar.</small></p>
            @endif
        </div>

        <!-- Giới tính -->
        <div>
            <label for="gender" class="form-label">Giới Tính</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Khác</option>
            </select>
        </div>

        <!-- Địa chỉ -->
        <div>
            <label for="address" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
        </div>

        <!-- Mật khẩu mới -->
        <div>
            <label for="password" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- Xác nhận mật khẩu -->
        <div>
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin</button>
    </form>
</div>
@endsection



<style>
    /* Định dạng chung cho trang tài khoản */
.profile-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề trang */
.profile-container h1 {
    text-align: center;
    font-size: 2rem;
    color: #333;
    margin-bottom: 30px;
}

/* Cảnh báo thành công */
.alert-success {
    background-color: #28a745;
    color: white;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Các trường nhập dữ liệu */
.profile-container .form-label {
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.profile-container .form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 1rem;
}

.profile-container .form-control:focus {
    border-color: #007bff;
    outline: none;
}

/* Hình ảnh avatar */
.profile-container img {
    margin-top: 10px;
    border-radius: 5px;
}

.profile-container small {
    color: #666;
    font-size: 0.9rem;
}

/* Nút cập nhật */
.profile-container .btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    width: 100%;
    text-align: center;
}

.profile-container .btn-primary:hover {
    background-color: #0056b3;
}

/* Các ô nhập liệu khi không có avatar */
.profile-container .form-control::placeholder {
    color: #aaa;
}

/* Phần giao diện responsive */
@media (max-width: 768px) {
    .profile-container {
        padding: 15px;
    }

    .profile-container h1 {
        font-size: 1.5rem;
    }

    .profile-container .btn-primary {
        width: 100%;
    }
}
</style>
