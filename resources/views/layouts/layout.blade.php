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
        <!-- Logo -->
        <div class="header-logo">
            <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="HOTNEWS360 Logo">
        </div>

        <!-- Menu và Form tìm kiếm -->
        <div class="header-content">
            <!-- Menu -->
            <div class="header-left">
                <ul>
                    <li><a href="/">Trang Chủ</a></li>
                    <li><a href="{{ route('about') }}">Giới Thiệu</a></li>
                    <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                    <li><a href="{{ route('quangcao') }}">Quảng Cáo</a></li>
                </ul>
            </div>

            <!-- Form tìm kiếm -->
            <div class="header-right">
                <form action="#" method="GET">
                    <input type="text" placeholder="Tìm kiếm..." name="q">
                    <button type="submit">Tìm</button>
                </form>
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
                    <li><p>Không có danh mục nào.</p></li>
                @endif
            </ul>
        </div>
    </nav>

    <main class="content">
        <article>@yield('noidung')</article>

        <!-- Sidebar: Quảng cáo -->
        <aside>
            <h2>Các Mẫu Quảng Cáo Đã Thực Hiện</h2>
            <div class="ad-sample-list">
                @php
                    // Hardcode dữ liệu mẫu cho quảng cáo
                    $ads = [
                        ['title' => 'Quảng cáo Banner', 'description' => 'Mẫu quảng cáo banner hiển thị ở đầu trang web.', 'image' => 'banner.jpg'],
                        ['title' => 'Quảng cáo Pop-up', 'description' => 'Mẫu quảng cáo pop-up xuất hiện khi người dùng truy cập.', 'image' => 'popup.jpg'],
                        ['title' => 'Quảng cáo Video', 'description' => 'Mẫu quảng cáo video ngắn gọn, hấp dẫn.', 'image' => 'video.jpg'],
                        ['title' => 'Quảng cáo trên mạng xã hội', 'description' => 'Mẫu quảng cáo tối ưu hóa cho Facebook, Instagram.', 'image' => 'social.jpg'],
                        ['title' => 'Quảng cáo Native', 'description' => 'Mẫu quảng cáo tích hợp tự nhiên vào nội dung trang web.', 'image' => 'native.jpg'],
                    ];
                @endphp

                @foreach ($ads as $ad)
                    <div class="ad-sample-item">
                        <div class="image-placeholder">
                            <img src="{{ asset('storage/images/' . $ad['image']) }}" alt="{{ $ad['title'] }}">
                        </div>
                        <h3>{{ $ad['title'] }}</h3>
                        <p>{{ $ad['description'] }}</p>
                        <a href="#">Xem chi tiết</a>
                    </div>
                @endforeach
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
                <a href="https://www.facebook.com/Autosubz.comm/" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/Dev_Dmanh2005" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/dev-dmanh2005/" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://github.com/DevDManh2005" target="_blank" class="social-icon"><i class="fab fa-github"></i></a>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Lê Đức Mạnh. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>