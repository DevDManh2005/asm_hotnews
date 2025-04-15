@extends('layouts.layout')

@section('title', 'Đăng Nhập')

@section('noidung')
<div class="login-container">
    <h1>Đăng nhập</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="hidden" name="role">
        <button type="submit">Đăng nhập</button>
    </form>
    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
</div>
@endsection
