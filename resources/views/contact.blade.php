@extends('layouts.layout')
@section('title', 'Liên Hệ')
@section('noidung')
<div class="contact-container">
    <h1>Liên Hệ với chúng tôi</h1>
    <p>Chúng tôi luôn lắng nghe ý kiến của độc giả để cải thiện và cung cấp thông tin tốt hơn. Nếu bạn có bất kỳ câu hỏi hoặc góp ý nào, đừng ngần ngại gửi thông tin liên hệ qua form dưới đây:</p>

    <!-- Contact Form -->
    <form class="contact-form" action="/submit-contact" method="POST">
        @csrf <!-- Thêm token CSRF nếu bạn đang sử dụng Laravel -->
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email của bạn" required>

        <label for="subject">Tiêu đề:</label>
        <input type="text" id="subject" name="subject" placeholder="Nhập tiêu đề liên hệ" required>

        <label for="message">Nội dung:</label>
        <textarea id="message" name="message" placeholder="Nhập nội dung liên hệ của bạn" required></textarea>

        <button type="submit">Gửi liên hệ</button>
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
    /* General Styles */
    .contact-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .contact-container h1 {
        text-align: center;
        color: #ff6600;
        margin-bottom: 30px;
        font-size: 36px;
        font-weight: bold;
    }
    
    .contact-container p {
        font-size: 18px;
        line-height: 1.8;
        color: #555;
        text-align: justify;
    }
    
    /* Form Styles */
    .contact-form {
        margin-top: 30px;
    }
    
    .contact-form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }
    
    .contact-form input[type="text"],
    .contact-form input[type="email"],
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    
    .contact-form textarea {
        resize: vertical;
        height: 120px;
    }
    
    .contact-form button {
        display: inline-block;
        padding: 10px 20px;
        background: #ff6600;
        color: #fff;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    
    .contact-form button:hover {
        background: #e65c00;
    }
    
    /* Flexbox Layout for Google Map and Facebook Plugin */
    .contact-map-facebook {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        gap: 20px;
    }
    
    /* Google Map Style */
    .google-map {
        width: calc(50% - 10px); /* Takes up 50% of the available space */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    .google-map iframe {
        width: 100%;
        height: 450px;
        border: 0;
    }
    
    /* Facebook Page Plugin Style */
    .fb-page-container {
        width: calc(50% - 10px); /* Takes up 50% of the available space */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    .fb-page {
        width: 100%;
        height: 450px;
        overflow: hidden;
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .contact-map-facebook {
            flex-direction: column;
        }
    
        .google-map,
        .fb-page-container {
            width: 100%;
        }
    }
    </style>
    