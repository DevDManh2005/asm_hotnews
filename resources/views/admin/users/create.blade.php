@extends('admin.layout.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Thêm Người Dùng</h1>

        <!-- Hiển thị thông báo lỗi nếu có -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <!-- Tên người dùng -->
            <div class="mb-3">
                <label for="name" class="form-label">Tên Người Dùng</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <!-- Mật khẩu -->
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Xác nhận mật khẩu -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <!-- Vai trò -->
            <div class="mb-3">
                <label for="role" class="form-label">Vai Trò</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
        </form>
    </div>
@endsection