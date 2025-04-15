@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Quản Lý Danh Mục</h1>

    <!-- Thông báo thành công khi thêm, sửa, xóa danh mục -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Nút thêm danh mục mới -->
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-4">Thêm Danh Mục</a>

    <!-- Bảng hiển thị danh mục -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Slug</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <!-- Chỉnh sửa danh mục -->
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Sửa</a>

                        <!-- Xóa danh mục -->
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
