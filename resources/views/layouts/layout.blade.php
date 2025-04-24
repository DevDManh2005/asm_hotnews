<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title')</title>
</head>

<body>
    <div class="banner_chinh">
        <img src="{{ asset('images/banner30-4.jpg') }}" alt="Banner" class="banner-img">
    </div>
    <!-- Phần đầu trang -->
    <header class="header">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
                <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="Logo HOTNEWS360" class="logo-img">
            </div>

            <!-- Hộp tìm kiếm -->
            <form action="{{ route('news.search') }}" method="get" class="search-form">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm kiếm bài viết..."
                    class="search-input">
                <button type="submit" class="search-button">Tìm kiếm</button>
            </form>

            <!-- Nút Đăng nhập/Đăng ký/Thoát -->
            <div class="auth-buttons">
                @if (Auth::check())
                    <div class="user-info">
                        <img src="{{ Auth::user()->avatar ? asset('images/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}"
                            alt="Avatar" class="user-avatar">
                        <span>Xin chào, {{ Auth::user()->name }}</span>
                    </div>
                    <a href="{{ route('profile') }}" class="btn-profile"><button>Tài Khoản</button></a>
                    @if(Auth::user()->role == 'admin')

                        <a href="{{ route('admin.dashboard') }}" class="btn-admin"><button>Quản Trị</button></a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button">Đăng Xuất</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-login"><button>Đăng Nhập</button></a>
                    <a href="{{ route('register') }}" class="btn-register"><button>Đăng Ký</button></a>
                    <a href="{{ route('password.request') }}" class="btn-forgot-password"><button>Quên Mật Khẩu?</button></a>
                @endif
            </div>
        </div>
    </header>

    <!-- Điều hướng chính (Thanh bên Danh mục) -->
    <nav class="navbar">
        <div class="container">
            <ul class="navbar-nav">
                <li><a href="/" class="nav-link">Trang Chủ</a></li>
                @if(isset($categories) && $categories->count() > 0)
                    @foreach ($categories as $cat)
                        <li><a href="{{ route('category.show', $cat->slug) }}" class="nav-link">{{ $cat->name }}</a></li>
                    @endforeach
                @else
                    <li>
                        <p>Không có danh mục nào.</p>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- Phần banner -->
    <div class="banner_phu">
        <img src="{{ asset('images/bannerphu.jpg') }}" alt="Banner" class="banner-img">
    </div>

    <main class="main-content">
        <!-- Bài viết chính -->
        <article>
            <section>
                @yield('noidung') <!-- Nội dung bài viết sẽ được chèn vào đây -->
            </section>
        </article>
    
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Bản tin</h2> <!-- Tiêu đề của sidebar -->
            <!-- Bạn có thể thêm nội dung khác cho sidebar ở đây -->
        </aside>
    </main>
    

    <!-- Phần chân trang -->
    <footer class="footer">
        <div class="container">
            <div class="footer-logo">
                <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="Logo HOTNEWS360" class="footer-logo-img">
            </div>
            <div class="social-links">
                <a href="https://www.facebook.com/Autosubz.comm/" target="_blank" class="social-icon">
                    <i class="fab fa-facebook-f"></i> <!-- Icon Facebook -->
                </a>
                <a href="https://x.com/Dev_Dmanh2005" target="_blank" class="social-icon">
                    <i class="fab fa-twitter"></i> <!-- Icon Twitter -->
                </a>
                <a href="https://www.linkedin.com/in/dev-dmanh2005/" target="_blank" class="social-icon">
                    <i class="fab fa-linkedin-in"></i> <!-- Icon LinkedIn -->
                </a>
                <a href="https://github.com/DevDManh2005" target="_blank" class="social-icon">
                    <i class="fab fa-github"></i> <!-- Icon GitHub -->
                </a>
            </div>
        </div>
        <div class="footer-copy">
            <p>© 2025 Lê Đức Mạnh. Bảo lưu mọi quyền.</p>
        </div>
    </footer>

</body>

</html>