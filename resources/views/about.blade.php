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
    .about-container {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }
    .about-container h1 {
        text-align: center;
        color: #ff6600;
        margin-bottom: 20px;
    }
    .about-container h2 {
        color: #333;
        border-bottom: 2px solid #ff6600;
        padding-bottom: 5px;
        margin-top: 20px;
    }
    .about-container p {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }
    .about-container ul {
        list-style: none;
        padding: 0;
    }
    .about-container ul li {
        background: #f9f9f9;
        margin: 5px 0;
        padding: 10px;
        border-radius: 5px;
        transition: 0.3s;
    }
    .about-container ul li:hover {
        background: #ff6600;
        color: white;
    }
    .about-container strong {
        color: #000000;
    }
</style>