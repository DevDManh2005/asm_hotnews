@extends('layouts.layout')
@section('title', 'Quảng Cáo')
@section('noidung')

<div class="contact-container">
    <h1>Liên Hệ Quảng Cáo</h1>
    <p>Nếu bạn muốn hợp tác với chúng tôi để quảng bá sản phẩm hoặc dịch vụ của mình, vui lòng điền vào form dưới đây. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất!</p>

    <!-- Contact Form -->
    <form class="ad-form" action="/submit-ad-request" method="POST">
        @csrf <!-- Thêm token CSRF nếu bạn đang sử dụng Laravel -->

        <!-- Thông tin cá nhân -->
        <h3>Thông tin cá nhân</h3>
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email của bạn" required>

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại liên hệ" required>

        <!-- Thông tin quảng cáo -->
        <div class="section-divider"></div>
        <h3>Thông tin quảng cáo</h3>
        <label for="company">Tên công ty / Thương hiệu:</label>
        <input type="text" id="company" name="company" placeholder="Nhập tên công ty hoặc thương hiệu của bạn">

        <label for="ad-type">Loại quảng cáo:</label>
        <select id="ad-type" name="ad_type" required>
            <option value="">-- Chọn loại quảng cáo --</option>
            <option value="banner">Quảng cáo Banner</option>
            <option value="popup">Quảng cáo Pop-up</option>
            <option value="video">Quảng cáo Video</option>
            <option value="social">Quảng cáo trên mạng xã hội</option>
            <option value="other">Khác</option>
        </select>

        <label for="budget">Ngân sách dự kiến (VNĐ):</label>
        <input type="number" id="budget" name="budget" placeholder="Nhập ngân sách dự kiến" required>

        <label for="duration">Thời gian chạy quảng cáo:</label>
        <input type="text" id="duration" name="duration" placeholder="Ví dụ: 1 tháng, 3 tháng..." required>

        <label for="additional-info">Yêu cầu khác:</label>
        <textarea id="additional-info" name="additional_info" placeholder="Nhập thêm thông tin hoặc yêu cầu đặc biệt"></textarea>

        <!-- Nút gửi -->
        <button type="submit">Gửi yêu cầu quảng cáo</button>
    </form>

    <!-- Flexbox container for Google Map and Facebook Page Plugin -->
    <div class="contact-map-facebook">
        <!-- Google Maps -->
        <div class="google-map">
            <h3>Vị trí của chúng tôi trên Google Maps</h3>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.668321559293!2d105.79951531446562!3d21.00734719380062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac90e7c7bb97%3A0x5e0e6b9c6e1c6e1c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7FjLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2sus!4v1698249600000!5m2!1sen!2sus"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>

        <!-- Facebook Page Plugin -->
        <div class="fb-page-container">
            <h3>Theo dõi chúng tôi trên Facebook</h3>
            <div class="fb-page"
                data-href="https://www.facebook.com/Autosubz.comm"
                data-tabs="timeline"
                data-width="500"
                data-height="450"
                data-small-header="false"
                data-adapt-container-width="true"
                data-hide-cover="false"
                data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/Autosubz.comm" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/Autosubz.comm">Lê Đức Mạnh</a>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<!-- Facebook SDK -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0" nonce="YOUR_NONCE_VALUE"></script>

@endsection

<style>
   /* 🌟 Container chính */
.contact-container {
    max-width: 1200px;
    margin: 40px auto; /* Căn giữa nội dung */
    padding: 30px; /* Padding rộng hơn */
    background: #fff; /* Nền trắng */
    border-radius: 15px; /* Bo tròn góc mềm mại */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* 🌟 Tiêu đề lớn */
.contact-container h1 {
    text-align: center;
    color: #1e3a8a; /* Màu xanh biển thay vì cam */
    margin-bottom: 30px;
    font-size: 36px;
    font-weight: 700;
}

/* 🌟 Đoạn văn */
.contact-container p {
    font-size: 18px;
    line-height: 1.8; /* Chiều cao dòng thoải mái */
    color: #333; /* Màu chữ tối hơn để dễ đọc */
    text-align: justify;
    margin-bottom: 30px;
}

/* 🌟 Form liên hệ */
.ad-form {
    margin-top: 30px;
}

.ad-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #1e3a8a; /* Màu xanh biển */
}

.ad-form input[type="text"],
.ad-form input[type="email"],
.ad-form select,
.ad-form textarea {
    width: 100%;
    padding: 12px; /* Padding rộng hơn */
    margin-bottom: 20px; /* Khoảng cách giữa các trường */
    border: 1px solid #ccc;
    border-radius: 8px; /* Bo tròn góc mềm mại hơn */
    font-size: 16px;
    transition: border-color 0.3s ease; /* Hiệu ứng mượt mà */
}

.ad-form textarea {
    resize: vertical;
    height: 150px; /* Tăng chiều cao của ô nhập liệu */
}

.ad-form input:focus,
.ad-form select:focus,
.ad-form textarea:focus {
    border-color: #ff9800; /* Viền cam khi focus */
    outline: none; /* Loại bỏ viền mặc định */
}

.ad-form button {
    display: inline-block;
    padding: 12px 25px; /* Padding rộng hơn */
    background: #ff9800; /* Màu cam */
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 8px; /* Bo tròn góc mềm mại hơn */
    cursor: pointer;
    transition: background 0.3s ease;
}

.ad-form button:hover {
    background: #e65100; /* Màu cam đậm khi hover */
}

/* 🌟 Section Divider */
.section-divider {
    margin: 40px 0;
    border-top: 2px solid #f0f0f0; /* Đường kẻ nhạt */
}

/* 🌟 Flexbox Layout cho Google Map và Facebook Plugin */
.contact-map-facebook {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    gap: 20px;
}

/* 🌟 Google Map Style */
.google-map {
    width: calc(50% - 10px); /* Chiếm 50% không gian */
    border-radius: 12px; /* Bo tròn góc mềm mại hơn */
    overflow: hidden;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
}

.google-map iframe {
    width: 100%;
    height: 450px;
    border: 0;
}

/* 🌟 Facebook Page Plugin Style */
.fb-page-container {
    width: calc(50% - 10px); /* Chiếm 50% không gian */
    border-radius: 12px; /* Bo tròn góc mềm mại hơn */
    overflow: hidden;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Bóng đổ đậm hơn */
}

.fb-page {
    width: 100%;
    height: 450px;
    overflow: hidden;
}

/* 🌟 Responsive Design */
@media (max-width: 992px) {
    .contact-map-facebook {
        flex-direction: column;
    }

    .google-map,
    .fb-page-container {
        width: 100%; /* Chiếm toàn bộ chiều rộng trên màn hình nhỏ */
    }
}
    </style>