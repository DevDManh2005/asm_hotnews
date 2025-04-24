@extends('admin.layout.admin')
@section('title', 'Thêm Danh Mục')
@section('content')
<div class="container-categories-create">
    <h1>Thêm Danh Mục</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <!-- Tên danh mục -->
        <div>
            <label for="name" class="form-label">Tên Danh Mục</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <!-- Slug -->
        <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
    </form>
</div>
@endsection
<style>
    /* Container chính của phần Thêm Danh Mục */
.container-categories-create {
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

/* Tiêu đề trang */
.container-categories-create h1 {
    font-size: 2em;
    color: #2d3e50;
    margin-bottom: 30px;
    font-weight: 600;
}

/* Các nhóm form */
div {
    margin-bottom: 20px;
}

div label {
    font-size: 1.1em;
    color: #34495e;
    margin-bottom: 10px;
    display: inline-block;
}

/* Các trường nhập liệu */
div input {
    width: 100%;
    padding: 12px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f7f7f7;
    transition: border 0.3s ease;
}

div input:focus {
    border-color: #3498db; /* Màu sáng khi focus vào các input */
    outline: none;
}

/* Nút bấm Thêm Danh Mục */
button {
    background-color: #1abc9c;
    color: #fff;
    padding: 12px 25px;
    font-size: 1.1em;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%; /* Nút chiếm toàn bộ chiều rộng */
    margin-top: 20px;
}

button:hover {
    background-color: #16a085; /* Màu nút khi hover */
}

/* Cải thiện layout cho form */
.container-categories-create form {
    display: flex;
    flex-direction: column;
}

</style>