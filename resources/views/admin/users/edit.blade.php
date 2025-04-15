@extends('admin.layout.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Chỉnh Sửa Người Dùng</h1>

        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')

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

            <!-- Trường mật khẩu -->
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu (để trống nếu không thay đổi)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <!-- Trường xác nhận mật khẩu -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <!-- Vai trò -->
            <div class="mb-3">
                <label for="role" class="form-label">Vai Trò</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật Người Dùng</button>
        </form>

    </div>
@endsection
