@extends('layouts.layout')

@section('title', 'Tài Khoản')

@section('noidung')
<div class="container">
    <h1 class="mb-4">Quản Lý Tài Khoản</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT') <!-- Sử dụng PUT để cập nhật dữ liệu -->
        
        <!-- Tên người dùng -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên Người Dùng</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
    
        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
    
        <!-- Mật khẩu mới (tùy chọn) -->
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới (để trống nếu không thay đổi)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
    
        <!-- Xác nhận mật khẩu -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
    
        <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin</button>
    </form>
</div>
@endsection
