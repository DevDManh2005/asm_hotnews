@extends('layouts.layout')

@section('title', 'Tài Khoản')

@section('noidung')
<div class="container profile-container py-5">
    <h1 class="text-center mb-4">Quản Lý Tài Khoản</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tên người dùng -->
        <div class="mb-3">
            <label for="name" class="form-label"><i class="bi bi-person"></i> Tên Người Dùng</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <!-- Avatar -->
        <div class="mb-3">
            <label for="avatar" class="form-label"><i class="bi bi-image"></i> Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">

            @if($user->avatar)
                <div class="mt-3">
                    <p>Avatar hiện tại:</p>
                    <img src="{{ asset('images/' . $user->avatar) }}" alt="avatar" class="img-fluid rounded" width="100">
                    <p><small>Chọn ảnh mới nếu bạn muốn thay đổi avatar.</small></p>
                </div>
            @else
                <p><small>Hiện tại bạn chưa có avatar.</small></p>
            @endif
        </div>

        <!-- Giới tính -->
        <div class="mb-3">
            <label for="gender" class="form-label"><i class="bi bi-gender-ambiguous"></i> Giới Tính</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Khác</option>
            </select>
        </div>

        <!-- Địa chỉ -->
        <div class="mb-3">
            <label for="address" class="form-label"><i class="bi bi-house-door"></i> Địa Chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
        </div>

        <!-- Mật khẩu mới -->
        <div class="mb-3">
            <label for="password" class="form-label"><i class="bi bi-lock"></i> Mật khẩu mới</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- Xác nhận mật khẩu -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label"><i class="bi bi-lock-fill"></i> Xác nhận mật khẩu mới</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-save"></i> Cập Nhật Thông Tin</button>
    </form>
</div>
@endsection

<style>
    /* Định dạng chung cho trang tài khoản */
    .profile-container {
        max-width: 800px;
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 5px;
        font-size: 1rem;
        padding: 12px;
        border: 1px solid #ccc;
    }

    .form-select {
        border-radius: 5px;
        font-size: 1rem;
        padding: 12px;
        border: 1px solid #ccc;
    }

    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.25);
    }

    .img-fluid {
        transition: transform 0.3s ease;
    }

    .img-fluid:hover {
        transform: scale(1.05);
    }

    .alert {
        transition: opacity 0.5s ease;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        font-weight: 600;
        border-radius: 5px;
        padding: 12px;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .profile-container {
            padding: 20px;
        }

        .form-control, .form-select {
            font-size: 0.9rem;
        }

        .btn-primary {
            font-size: 1rem;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
