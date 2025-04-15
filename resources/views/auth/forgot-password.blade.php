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
