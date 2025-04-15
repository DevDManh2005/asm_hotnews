@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm Danh Mục</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <!-- Tên danh mục -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên Danh Mục</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <!-- Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
        </div>

        <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
    </form>
</div>
@endsection
