@extends('layouts.layout')

@section('title', 'Giới Thiệu')

@section('noidung')

<!-- Wrapper cho trang giới thiệu -->
<div class="container py-5">
    <div class="row mb-4">
        <!-- Tiêu đề Giới thiệu -->
        <div class="col-12 text-center">
            <h2 class="text-primary mb-3">Giới Thiệu Về HOTNEWS360</h2>
            <p class="text-muted">Khám phá câu chuyện, sứ mệnh và giá trị của chúng tôi</p>
        </div>
    </div>

    <!-- Sứ mệnh -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h3 class="text-secondary mb-3">Sứ Mệnh Của HOTNEWS360</h3>
            <p class="lead">HOTNEWS360 cam kết mang đến cho bạn những tin tức chính xác, nhanh chóng và đáng tin cậy. Chúng tôi luôn cập nhật các sự kiện nóng hổi từ mọi lĩnh vực, bao gồm chính trị, xã hội, công nghệ, giải trí và thể thao. Chúng tôi không chỉ truyền tải thông tin mà còn tạo ra những câu chuyện, những góc nhìn mới, làm phong phú thêm cuộc sống của bạn.</p>
        </div>
    </div>
    
    <!-- Card Giới thiệu -->
    <div class="row mb-5">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded">
                <div class="card-body text-center">
                    <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Tin Tức Chính Xác</h5>
                    <p class="card-text">Chúng tôi cam kết cung cấp những tin tức chính xác, được xác minh từ nhiều nguồn đáng tin cậy, giúp bạn cập nhật nhanh chóng và chính xác các sự kiện quan trọng nhất.</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded">
                <div class="card-body text-center">
                    <i class="fas fa-broadcast-tower fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Cập Nhật Nhanh Chóng</h5>
                    <p class="card-text">Với hệ thống cập nhật tin tức tự động và đội ngũ biên tập viên chuyên nghiệp, HOTNEWS360 luôn cung cấp những thông tin nóng hổi, diễn biến mới nhất trong từng khoảnh khắc.</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Cộng Đồng Tương Tác</h5>
                    <p class="card-text">Chúng tôi không chỉ là một trang web tin tức. HOTNEWS360 tạo ra một cộng đồng những người yêu thích chia sẻ thông tin và thảo luận về các sự kiện nổi bật.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Dịch vụ của chúng tôi -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h3 class="text-info mb-3">Các Dịch Vụ Của HOTNEWS360</h3>
            <p class="lead">HOTNEWS360 cung cấp các dịch vụ tổng hợp tin tức, bình luận chuyên sâu, và các bản tin hàng ngày để bạn không bao giờ bỏ lỡ những thông tin quan trọng.</p>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-tv fa-3x text-info mb-3"></i>
                    <h5 class="card-title">Tin Tức Trực Tuyến</h5>
                    <p class="card-text">Chúng tôi cung cấp dịch vụ tin tức trực tuyến, giúp bạn dễ dàng theo dõi mọi sự kiện đang diễn ra ngay lập tức trên các thiết bị di động và máy tính của mình.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-comments fa-3x text-danger mb-3"></i>
                    <h5 class="card-title">Bình Luận & Phân Tích</h5>
                    <p class="card-text">Bên cạnh việc cập nhật tin tức, chúng tôi còn mang đến những bài viết phân tích, bình luận sâu sắc về các sự kiện quan trọng, giúp bạn nhìn nhận vấn đề toàn diện hơn.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-cloud fa-3x text-muted mb-3"></i>
                    <h5 class="card-title">Lưu Trữ Dữ Liệu</h5>
                    <p class="card-text">Chúng tôi cung cấp các bản tin lưu trữ, giúp bạn dễ dàng tìm kiếm lại những bài viết cũ về các sự kiện đã qua một cách nhanh chóng.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
