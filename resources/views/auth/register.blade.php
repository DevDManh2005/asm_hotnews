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
