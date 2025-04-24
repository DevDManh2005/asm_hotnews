@extends('admin.layout.admin')
@section('title', 'Chỉnh Sửa Bài Viết')
@section('content')
    <div class="container-news-edit">
        <h1>Chỉnh Sửa Bài Viết</h1>

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="form-edit-news">
            @csrf
            @method('PUT')

            <!-- Tiêu đề bài viết -->
            <div class="form-group">
                <label for="title">Tiêu Đề</label>
                <input type="text" id="title" name="title" value="{{ $news->title }}" required>
            </div>

            <!-- Nội dung bài viết (CKEditor) -->
            <div class="form-group">
                <label for="content">Nội Dung</label>
                <textarea id="editor" name="content" rows="10" required>{{ $news->content }}</textarea>
            </div>

            <!-- Danh mục -->
            <div class="form-group">
                <label for="category_id">Danh Mục</label>
                <select id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Slug bài viết -->
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ $news->slug }}">
            </div>
            <!-- Hình ảnh bài viết -->
            <div class="form-group">
                <label for="image">Hình Ảnh</label>
                <input type="file" id="image" name="image" accept="image/*">
                @if ($news->image)
                    <div class="image-preview mt-2">
                        <p><strong>Hình ảnh hiện tại:</strong></p>
                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" style="width: 200px; height: auto;">
                    </div>
                @else
                    <p>Không có hình ảnh</p>
                @endif
            </div>

            <!-- Nút cập nhật bài viết -->
            <button type="submit" class="btn btn-submit">Cập Nhật Bài Viết</button>
        </form>
    </div>
@endsection

<style>
    #editor img {
        width: 300px;
        height: 150px;
    }
</style>

<style>
    
    /* Container chính của phần chỉnh sửa bài viết */
.container-news-edit {
    padding: 30px;
    background-color: #fff;
    margin-top: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề trang */
.container-news-edit h1 {
    font-size: 2em;
    color: #2d3e50;
    margin-bottom: 30px;
    font-weight: 600;
}

/* Các nhóm form */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 1.1em;
    color: #34495e;
    margin-bottom: 10px;
    display: inline-block;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f7f7f7;
    transition: border 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #3498db; /* Màu sáng khi focus vào các input, select, textarea */
    outline: none;
}

/* Các trường nội dung */
.form-group textarea {
    resize: vertical; /* Cho phép thay đổi chiều cao */
}

/* Hiển thị hình ảnh hiện tại */
.image-preview {
    margin-top: 10px;
}

.image-preview img {
    width: 200px;
    height: auto;
    border-radius: 8px;
}

/* Nút bấm cập nhật bài viết */
.btn-submit {
    background-color: #1abc9c; /* Nút màu sáng hiện đại */
    color: #fff;
    padding: 12px 25px;
    font-size: 1.1em;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #16a085; /* Màu nút khi hover */
}

/* Cải thiện khoảng cách giữa các phần tử */
.container-news-edit form {
    display: flex;
    flex-direction: column;
}

/* Điều chỉnh kích thước của các trường dữ liệu */
.form-group input[type="file"] {
    padding: 8px;
    font-size: 1em;
    border-radius: 8px;
    background-color: #fff;
    border: 1px solid #ccc;
    margin-top: 10px;
}

/* Đảm bảo khoảng cách giữa các phần tử trong form */
.form-group input,
.form-group select,
.form-group textarea,
.form-group button {
    margin-bottom: 20px;
}

</style>