@extends('admin.layout.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Quản Lý Quảng Cáo</h1>

    <!-- Hiển thị thông báo thành công nếu có -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Nút thêm quảng cáo -->
    <a href="{{ route('admin.ads.create') }}" class="btn btn-primary mb-4">Thêm Quảng Cáo</a>

    <!-- Bảng hiển thị quảng cáo -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Thương Hiệu</th>
                <th>Sản Phẩm</th>
                <th>Hình Ảnh</th>
                <th>Mô Tả</th>
                <th>Đường Link</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
                <tr>
                    <td>{{ $ad->id }}</td>
                    <td>{{ $ad->title }}</td>
                    <td>{{ $ad->brand_name }}</td>
                    <td>{{ $ad->product_name }}</td>
                    <td>
                        @if ($ad->image)
                            <img src="{{ asset($ad->image) }}" alt="{{ $ad->title }}" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <span>Không có hình ảnh</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($ad->description, 50) }}</td> <!-- Hiển thị mô tả quảng cáo, cắt ngắn nếu dài -->
                    <td><a href="{{ $ad->link }}" target="_blank">{{ $ad->link }}</a></td>
                    <td>
                        <!-- Nút sửa -->
                        <a href="{{ route('admin.ads.edit', $ad->id) }}" class="btn btn-warning">Sửa</a>
                        
                        <!-- Nút xóa -->
                        <form action="{{ route('admin.ads.destroy', $ad->id) }}" method="POST" style="display:inline;">
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
