@extends('admin.layout.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Chỉnh Sửa Bài Viết</h1>

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu Đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội Dung</label>
                <textarea class="form-control" id="content" name="content" rows="10"
                    required>{{ $news->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh Mục</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $news->slug }}">
            </div>
            <div class="mb-3">
                <label for="views" class="form-label">Lượt Xem</label>
                <input type="number" class="form-control" id="views" name="views" value="{{ $news->views }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @if ($news->image)
                <div class="mt-2">
                    <p><strong>Hình ảnh hiện tại:</strong></p>
                    <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" style="width: 200px; height: auto;">
                </div>
            @else
                <p>Không có hình ảnh</p>
            @endif
            

            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
        </form>

    </div>
@endsection