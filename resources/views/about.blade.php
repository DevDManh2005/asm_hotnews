@extends('layouts.layout')
@section('title', 'Giới Thiệu')
@section('noidung')

<div class="about-container">
    <h1>Chào mừng đến với HotNews360</h1>
    <p>HotNews360 là trang tin tức hàng đầu, cập nhật nhanh chóng và chính xác những thông tin nóng hổi trong nước và quốc tế.</p>
    
    <h2>Sứ mệnh của chúng tôi</h2>
    <p>Chúng tôi cam kết cung cấp tin tức đa chiều, trung thực và nhanh chóng để mang đến cho bạn những thông tin quan trọng nhất.</p>
    
    <h2>Chuyên mục nổi bật</h2>
    <ul>
        <li><strong>Trang Chủ:</strong> Điểm đến chính với các tin tức mới nhất.</li>
        <li><strong>Tin Tức:</strong> Cập nhật tin nóng trong nước và quốc tế.</li>
        <li><strong>Bóng Đá:</strong> Tin tức, lịch thi đấu và kết quả các giải đấu lớn.</li>
        <li><strong>Ngoại Hạng Anh:</strong> Cập nhật chi tiết về giải đấu hàng đầu thế giới.</li>
        <li><strong>Kinh Doanh:</strong> Phân tích tài chính, thị trường và xu hướng kinh tế.</li>
        <li><strong>Giải Trí:</strong> Tin tức về phim ảnh, âm nhạc và showbiz.</li>
        <li><strong>Sức Khỏe:</strong> Cập nhật thông tin hữu ích về sức khỏe và đời sống.</li>
        <li><strong>Hi-Tech:</strong> Tin tức công nghệ, xu hướng mới nhất.</li>
        <li><strong>Thế Giới:</strong> Tình hình chính trị, kinh tế và xã hội toàn cầu.</li>
        <li><strong>Thể Thao:</strong> Tin tức thể thao trong nước và quốc tế.</li>
        <li><strong>Ô TÔ:</strong> Cập nhật thị trường ô tô, xe cộ và đánh giá xe.</li>
        <li><strong>Phái Đẹp:</strong> Bí quyết làm đẹp, xu hướng thời trang.</li>
    </ul>
    
    <h2>Liên hệ với chúng tôi</h2>
    <p>Chúng tôi luôn sẵn sàng lắng nghe ý kiến đóng góp từ độc giả. Hãy liên hệ với chúng tôi qua email: <strong>contact@hotnews360.com</strong></p>
</div>

@endsection
<style>
   /* 🌟 Container chính */
.about-container {
    max-width: 800px;
    margin: 20px auto; /* Căn giữa nội dung */
    background: #fff; /* Nền trắng */
    padding: 30px; /* Tăng padding để tạo khoảng cách rộng hơn */
    border-radius: 12px; /* Bo tròn góc mềm mại hơn */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
    font-family: Arial, sans-serif;
}

/* 🌟 Tiêu đề lớn */
.about-container h1 {
    text-align: center;
    color: #1e3a8a; /* Màu xanh biển thay vì cam */
    font-size: 36px;
    margin-bottom: 20px;
    font-weight: 700;
}

/* 🌟 Tiêu đề phụ */
.about-container h2 {
    color: #1e3a8a; /* Màu xanh biển */
    border-bottom: 2px solid #ff9800; /* Viền cam nổi bật */
    padding-bottom: 10px;
    margin-top: 30px;
    font-size: 24px;
    font-weight: 600;
}

/* 🌟 Đoạn văn */
.about-container p {
    font-size: 16px;
    line-height: 1.8; /* Tăng chiều cao dòng để dễ đọc */
    color: #333; /* Màu chữ tối hơn để dễ nhìn */
    margin-bottom: 20px;
}

/* 🌟 Danh sách chuyên mục */
.about-container ul {
    list-style: none;
    padding: 0;
}

.about-container ul li {
    background: #f9f9f9; /* Màu nền nhạt */
    margin: 10px 0; /* Khoảng cách giữa các mục */
    padding: 15px; /* Padding rộng hơn */
    border-radius: 8px; /* Bo tròn góc mềm mại */
    transition: all 0.3s ease; /* Hiệu ứng mượt mà */
    cursor: pointer; /* Con trỏ chuột khi hover */
}

.about-container ul li:hover {
    background: #ff9800; /* Màu cam khi hover */
    color: white; /* Chữ trắng khi hover */
    transform: translateY(-5px); /* Nhấc lên nhẹ khi hover */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Thêm bóng đổ khi hover */
}

/* 🌟 Phần in đậm trong danh sách */
.about-container strong {
    color: #1e3a8a; /* Màu xanh biển */
    font-weight: bold;
}

/* 🌟 Email liên hệ */
.about-container a {
    color: #ff9800; /* Màu cam cho email */
    text-decoration: none; /* Ẩn dấu gạch dưới */
    font-weight: bold;
    transition: color 0.3s ease;
}

.about-container a:hover {
    color: #e65100; /* Màu cam đậm khi hover */
}
</style>