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
