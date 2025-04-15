@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Chỉnh Sửa Quảng Cáo</h1>

    <!-- Hiển thị thông báo thành công nếu có -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form sửa quảng cáo -->
    <form action="{{ route('admin.ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Tiêu Đề Quảng Cáo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $ad->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô Tả Quảng Cáo</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ $ad->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="brand_name">Tên Thương Hiệu</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ $ad->brand_name }}">
        </div>

        <div class="form-group">
            <label for="product_name">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $ad->product_name }}">
        </div>

        <div class="form-group">
            <label for="link">Đường Link Liên Kết</label>
            <input type="url" class="form-control" id="link" name="link" value="{{ $ad->link }}">
        </div>

        <div class="form-group">
            <label for="image">Hình Ảnh Quảng Cáo</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($ad->image)
                <img src="{{ asset($ad->image) }}" alt="{{ $ad->title }}" style="width: 100px; height: 100px; object-fit: cover;">
            @endif
        </div>

        <button type="submit" class="btn btn-success mt-3">Cập Nhật Quảng Cáo</button>
    </form>
</div>
@endsection
