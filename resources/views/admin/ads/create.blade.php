@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm Quảng Cáo Mới</h1>

    <!-- Hiển thị thông báo thành công nếu có -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form thêm quảng cáo -->
    <form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Các trường thông tin quảng cáo -->
        <div class="form-group">
            <label for="title">Tiêu Đề</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="brand_name">Thương Hiệu</label>
            <input type="text" name="brand_name" id="brand_name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="product_name">Sản Phẩm</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="link">Đường Link</label>
            <input type="url" name="link" id="link" class="form-control">
        </div>
    
        <div class="form-group">
            <label for="description">Mô Tả</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
    
        <div class="form-group">
            <label for="image">Hình Ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
    
        <button type="submit" class="btn btn-success">Lưu Quảng Cáo</button>
    </form>
</div>
@endsection
