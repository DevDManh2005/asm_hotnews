@extends('layouts.layout')

@section('title', 'Liên Hệ')

@section('noidung')

<!-- Wrapper cho phần Liên Hệ -->
<div class="container py-5">
    <div class="row">
        <!-- Tiêu đề liên hệ -->
        <div class="col-12 text-center mb-5">
            <h2>Liên Hệ Với Chúng Tôi</h2>
            <p class="text-muted">Hãy để lại thông tin của bạn, chúng tôi sẽ liên hệ lại trong thời gian sớm nhất.</p>
        </div>
    </div>

    <!-- Phần form liên hệ -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Gửi Thông Tin Liên Hệ</h4>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và Tên</label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên của bạn" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Lời nhắn</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Nhập lời nhắn của bạn" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Gửi Thông Tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Thông tin liên hệ khác -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h3 class="mb-3">Thông Tin Liên Hệ</h3>
            <p><i class="fas fa-phone-alt"></i> Điện thoại: <a href="tel:+84123456789">+84 123 456 789</a></p>
            <p><i class="fas fa-envelope"></i> Email: <a href="mailto:contact@example.com">hotnews360@gmail.com</a></p>
            <p><i class="fas fa-map-marker-alt"></i> Địa chỉ: 123 Đường ABC, Quận XYZ, Thành Phố Đà Nẵng</p>
        </div>
    </div>

    <!-- Google Map -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h3 class="mb-3">Vị trí của chúng tôi trên Google Maps</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.263623816633!2d108.16712607459976!3d16.05180403990524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142191680ef7f49%3A0x7e73d5e29a155cbc!2zMTIwIE5ndXnhu4VuIEh1eSBUxrDhu59uZywgSG_DoCBBbiwgTGnDqm4gQ2hp4buDdSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1745639595371!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Câu hỏi thường gặp (FAQ) -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">Câu Hỏi Thường Gặp</h3>
            <div id="faqAccordion">
                <div class="card">
                    <div class="card-header" id="faqHeadingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                                Làm thế nào để tôi liên hệ với bạn?
                            </button>
                        </h5>
                    </div>
                    <div id="faqCollapseOne" class="collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            Bạn có thể liên hệ với chúng tôi thông qua form liên hệ trên trang này, hoặc gửi email trực tiếp đến <a href="mailto:hotnews360@gmail.com">hotnews360@gmail.com</a>.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="faqHeadingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                Bạn có hỗ trợ tại các thành phố khác không?
                            </button>
                        </h5>
                    </div>
                    <div id="faqCollapseTwo" class="collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            Hiện tại, chúng tôi chỉ hỗ trợ tại Thành Phố Đà Nẵng, nhưng chúng tôi đang mở rộng ra các thành phố khác trong tương lai gần.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="faqHeadingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                                Bạn có hỗ trợ khẩn cấp không?
                            </button>
                        </h5>
                    </div>
                    <div id="faqCollapseThree" class="collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                        <div class="card-body">
                            Chúng tôi luôn sẵn sàng hỗ trợ bạn 24/7. Bạn có thể gọi đến số điện thoại hỗ trợ khẩn cấp: <a href="tel:+84123456789">+84 123 456 789</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Các kênh liên hệ mạng xã hội -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h3 class="mb-3">Theo Dõi Chúng Tôi Trên Mạng Xã Hội</h3>
            <div class="social-links mt-3">
                <a href="https://www.facebook.com/Autosubz.comm/" target="_blank" class="btn btn-social btn-facebook">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://x.com/Dev_Dmanh2005" target="_blank" class="btn btn-social btn-twitter">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
                <a href="https://www.linkedin.com/in/dev-dmanh2005/" target="_blank" class="btn btn-social btn-linkedin">
                    <i class="fab fa-linkedin-in"></i> LinkedIn
                </a>
                <a href="https://github.com/DevDManh2005" target="_blank" class="btn btn-social btn-github">
                    <i class="fab fa-github"></i> GitHub
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
