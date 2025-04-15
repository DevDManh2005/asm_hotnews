@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm Bài Viết</h1>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <!-- Tiêu đề bài viết -->
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu Đề</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>
    
        <!-- Nội dung bài viết -->
        <div class="mb-3">
            <label for="content" class="form-label">Nội Dung</label>
            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
        </div>
    
        <!-- Chọn danh mục -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh Mục</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    
        <!-- Slug bài viết -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
        </div>
    
        <!-- Lượt xem -->
        <div class="mb-3">
            <label for="views" class="form-label">Lượt Xem</label>
            <input type="number" class="form-control" id="views" name="views" value="{{ old('views', 0) }}">
        </div>
    
        <!-- Hình ảnh bài viết -->
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
    
        <button type="submit" class="btn btn-primary">Thêm Bài Viết</button>
    </form>
    
</div>
@endsection
