@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Chỉnh Sửa Danh Mục</h1>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tên danh mục -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên Danh Mục</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <!-- Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
    </form>
</div>
@endsection
