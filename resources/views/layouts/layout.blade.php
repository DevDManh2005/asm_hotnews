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
        <div class="header-wrapper">
            <!-- Logo -->
            <div class="header-logo">
                <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="HOTNEWS360 Logo">
            </div>

            <!-- Menu -->
            <div class="header-left">
                <ul>
                    <li><a href="/">Trang Chủ</a></li>
                    <li><a href="{{ route('about') }}">Giới Thiệu</a></li>
                    <li><a href="{{ route('contact') }}">Liên Hệ</a></li>

                </ul>
            </div>

            <!-- Thanh tìm kiếm -->
            <div class="header-right">
                <form action="#" method="GET">
                    <input type="text" placeholder="Tìm kiếm..." name="q">
                    <button type="submit">Tìm</button>
                </form>
            </div>

            <!-- Nút đăng nhập/đăng ký hoặc Tài khoản -->
            <div class="fromxacthuc">
                @if (Auth::check())
                    <a href="{{ route('profile') }}">
                        <button class="auth-btn account-btn">Tài Khoản</button>
                    </a>
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}">
                            <button class="auth-btn admin-btn">Quản Trị</button>
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
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
    
        @if (!in_array(Route::currentRouteName(), ['login', 'register', 'password.request', 'about', 'contact']))
        <aside>
            <div class="sidebar-right">
                @foreach ($ads as $ad)
                    <div class="ad-item">
                        <img src="{{ asset($ad->image) }}" alt="{{ $ad->title }}" class="ad-image">
                        <h3>{{ $ad->title }}</h3>
                        <p>{{ $ad->description }}</p>
                        <a href="{{ $ad->link }}" target="_blank" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                @endforeach
            </div>
        </aside>
        @endif
    </main>
    


    <footer class="footer">
        <div class="footer-header">
            <div class="footer-logo">
                <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="HOTNEWS360 Logo">
            </div>
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
            <p>© 2025 Lê Đức Mạnh. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>