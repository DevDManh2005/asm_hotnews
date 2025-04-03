<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title')</title>
</head>

<body>
    <header class="header">
        <div class="header-logo">
            <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="HOTNEWS360 Logo">
        </div>

        <div class="header-content">
            <div class="header-left">
                <ul>
                    <li><a href="/">Trang Chủ</a></li>
                    <li><a href="{{ route('about') }}">Giới Thiệu</a></li>
                    <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                    <li><a href="{{ route('quangcao') }}">Quảng Cáo</a></li>
                </ul>
            </div>

            <div class="header-right">
                <form action="#" method="GET">
                    <input type="text" placeholder="Tìm kiếm..." name="q">
                    <button type="submit">Tìm</button>
                </form>
            </div>
            <div class="fromxacthuc">
                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="auth-btn logout-btn">Đăng Xuất</button>
                    </form>
            @else
                    <a href="{{ route('login') }}">
                        <button class="auth-btn login-btn">Đăng Nhập</button>
                    </a>
                    <a href="{{ route('register') }}">
                        <button class="auth-btn register-btn">Đăng Ký</button>
                    </a>
                    <a href="{{ route('password.request') }}">
                        <button class="auth-btn forgot-btn">Quên Mật Khẩu?</button>
                    </a>
            @endif
            </div>
        </div>
    </header>

    <nav class="main-nav">
        <!-- Hiển thị danh sách danh mục -->
        <div class="categories-sidebar">
            <ul>
                @if(isset($categories) && $categories->count() > 0)
                    @foreach ($categories as $cat)
                        <li><a href="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</a></li>
                    @endforeach
                @else
                    <li>
                        <p>Không có danh mục nào.</p>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <main class="content">
        <article>@yield('noidung')</article>
        <aside>
            <h2>Các Mẫu Quảng Cáo Đã Thực Hiện</h2>
            <div class="ad-sample-list">
                <div class="ad-sample-item">
                    <div class="image-placeholder">
                        <img src="storage/images/banner.jpg" alt="Quảng cáo Banner">
                    </div>
                    <h3>Quảng cáo Banner</h3>
                    <p>Mẫu quảng cáo banner hiển thị ở đầu trang web.</p>
                    <a href="#">Xem chi tiết</a>
                </div>

                <div class="ad-sample-item">
                    <div class="image-placeholder">
                        <img src="storage/images/popup.jpg" alt="Quảng cáo Pop-up">
                    </div>
                    <h3>Quảng cáo Pop-up</h3>
                    <p>Mẫu quảng cáo pop-up xuất hiện khi người dùng truy cập.</p>
                    <a href="#">Xem chi tiết</a>
                </div>

                <div class="ad-sample-item">
                    <div class="image-placeholder">
                        <img src="storage/images/video.jpg" alt="Quảng cáo Video">
                    </div>
                    <h3>Quảng cáo Video</h3>
                    <p>Mẫu quảng cáo video ngắn gọn, hấp dẫn.</p>
                    <a href="#">Xem chi tiết</a>
                </div>

                <div class="ad-sample-item">
                    <div class="image-placeholder">
                        <img src="storage/images/social.jpg" alt="Quảng cáo trên mạng xã hội">
                    </div>
                    <h3>Quảng cáo trên mạng xã hội</h3>
                    <p>Mẫu quảng cáo tối ưu hóa cho Facebook, Instagram.</p>
                    <a href="#">Xem chi tiết</a>
                </div>

                <div class="ad-sample-item">
                    <div class="image-placeholder">
                        <img src="storage/images/native.jpg" alt="Quảng cáo Native">
                    </div>
                    <h3>Quảng cáo Native</h3>
                    <p>Mẫu quảng cáo tích hợp tự nhiên vào nội dung trang web.</p>
                    <a href="#">Xem chi tiết</a>
                </div>
            </div>
        </aside>

    </main>

    <footer class="footer">
        <div class="footer-logo">
            <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="">
        </div>

        <div class="footer-right">
            <div class="footer-links">
                <ul>
                    <li><a href="{{ route('about') }}">Giới Thiệu</a></li>
                    <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                    <li><a href="{{ route('quangcao') }}">Quảng Cáo</a></li>
                </ul>
            </div>

            <div class="footer-socials">
                <a href="https://www.facebook.com/Autosubz.comm/" target="_blank" class="social-icon"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/Dev_Dmanh2005" target="_blank" class="social-icon"><i
                        class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/dev-dmanh2005/" target="_blank" class="social-icon"><i
                        class="fab fa-linkedin-in"></i></a>
                <a href="https://github.com/DevDManh2005" target="_blank" class="social-icon"><i
                        class="fab fa-github"></i></a>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Lê Đức Mạnh. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>