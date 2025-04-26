<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
    <style>
        /* Thiết lập margin và padding mặc định cho tất cả phần tử */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Cải thiện search form */
        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            border-radius: 50px;
            padding-left: 35px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .search-input:focus {
            border-color: #2488f3;
            box-shadow: 0 0 5px rgba(36, 136, 243, 0.6);
        }

        .search-button {
            border-radius: 50px;
            background-color: #2488f3;
            color: white;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            padding: 5px 20px;
        }

        .search-button:hover {
            background-color: #003d80;
            transform: scale(1.05);
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        /* Hiệu ứng hover cho các mục navbar */
        .navbar-nav .nav-link {
            font-size: 1.1rem;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            transform: scale(1.1);
            color: #0056b3;
        }

        /* Các icon trong navbar */
        .navbar-nav .nav-link .fas {
            font-size: 1.3rem;
            color: #007bff;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .navbar-nav .nav-link:hover .fas {
            color: #0056b3;
            transform: scale(1.2);
        }

        /* Các icon trong footer */
        .social-icon {
            font-size: 24px;
            color: #fff;
            transition: transform 0.3s, color 0.3s;
        }

        .social-icon:hover {
            transform: scale(1.2);
            color: #007bff;
        }

        /* Hiệu ứng cho carousel-item khi hover */
        .carousel-item img {
            transition: transform 0.5s ease;
        }

        .carousel-item img:hover {
            transform: scale(1.05);
        }

        /* Logo và các phần tử khác trong footer */
        .footer-logo-img {
            height: 50px;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Hiệu ứng hover cho các card trong bài viết hot */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            /* Phóng to nhẹ khi hover */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Quảng cáo banner */
        .advertisement img {
            transition: transform 0.3s ease;
        }

        .advertisement:hover img {
            transform: scale(1.05);
            /* Hiệu ứng phóng to khi hover */
        }
    </style>
</head>

<body>
    <!-- Phần banner chính chỉ hiển thị trên trang chủ -->
    @if(Request::is('/'))
        <div class="container mt-4">
            <div class="text-center">
                <img src="{{ asset('images/LDM.gif') }}" alt="Banner" class="img-fluid">
            </div>
        </div>
    @endif

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <!-- Hiển thị ngày giờ thực tế -->
            <div class="navbar-text text-dark" id="current-time"></div>

            <!-- Hiển thị tên thành phố và nhiệt độ, thời tiết -->
            <div class="navbar-text text-dark ms-3" id="city-weather">Đang tải...</div>

            <!-- Các liên kết -->
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a href="{{ url('/gioithieu') }}" class="nav-link text-dark d-flex align-items-center">
                            <i class="fas fa-info-circle me-2"></i> Giới Thiệu
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ url('/lienhe') }}" class="nav-link text-dark d-flex align-items-center">
                            <i class="fas fa-phone-alt me-2"></i> Liên Hệ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Phần đầu trang -->
    <header class="bg-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="logo">
                <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="Logo HOTNEWS360" class="img-fluid"
                    style="height: 130px;">
            </div>

            <!-- Form tìm kiếm -->
            <form method="GET" action="{{ route('news.search') }}" class="d-flex search-form">
                <div class="position-relative">
                    <input type="text" name="query" placeholder="Tìm kiếm..." value="{{ request()->input('query') }}"
                        class="form-control search-input" style="width: 250px;">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <button type="submit" class="btn search-button ms-2">Tìm kiếm</button>
            </form>

            <!-- Nút Đăng nhập/Đăng ký/Thoát -->
            <div class="auth-buttons d-flex align-items-center">
                @if (Auth::check())
                    <div class="user-info d-flex align-items-center me-3">
                        <img src="{{ Auth::user()->avatar ? asset('images/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}"
                            alt="Avatar" class="user-avatar rounded-circle" style="width: 40px; height: 40px;">
                        <span class="ms-2">Xin chào, {{ Auth::user()->name }}</span>
                    </div>
                    <a href="{{ route('profile') }}" class="btn btn-outline-secondary"><i class="fas fa-user-circle"></i>
                        Tài Khoản</a>
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary"><i class="fas fa-cogs"></i>
                            Quản Trị</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="logout-form d-inline-block"
                        style="margin-top: 0px">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Đăng
                            Xuất</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2"><i class="fas fa-sign-in-alt"></i>
                        Đăng Nhập</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-success me-2"><i class="fas fa-user-plus"></i>
                        Đăng Ký</a>
                @endif
            </div>
        </div>
    </header>

    <!-- Điều hướng chính -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="/"><i class="fas fa-home"></i> Trang Chủ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(isset($categories) && $categories->count() > 0)
                        @foreach ($categories as $cat)
                            <li class="nav-item">
                                <a href="{{ route('category.show', $cat->slug) }}"
                                    class="nav-link text-white">{{ $cat->name }}</a>
                            </li>
                        @endforeach
                    @else
                        <li class="nav-item">
                            <p class="nav-link text-white">Không có danh mục nào.</p>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="container my-4">
        <div class="row">
            <article class="col-lg-8 col-md-7 mb-4">
                <section>
                    @yield('noidung')
                </section>
            </article>

            <!-- Phần sidebar -->
            @if(!Request::is('gioithieu*') && !Request::is('lienhe*') && !Request::is('profile*'))
            <aside class="col-lg-4 col-md-5">
                <div class="sidebar bg-light p-3">
                    @yield('sidebar')
                </div>
            </aside>
            @endif
            

            
        </div>
    </main>

    <!-- Phần chân trang -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <div class="footer-logo">
                <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="Logo HOTNEWS360" class="footer-logo-img"
                    style="height: 50px;">
            </div>
            <div class="social-links mt-3">
                <a href="https://www.facebook.com/Autosubz.comm/" target="_blank" class="social-icon text-white me-3"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/Dev_Dmanh2005" target="_blank" class="social-icon text-white me-3"><i
                        class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/dev-dmanh2005/" target="_blank"
                    class="social-icon text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://github.com/DevDManh2005" target="_blank" class="social-icon text-white"><i
                        class="fab fa-github"></i></a>
            </div>
        </div>
        <div class="footer-copy mt-3 text-center">
            <p>© 2025 Lê Đức Mạnh. Bảo lưu mọi quyền.</p>
        </div>
    </footer>


</body>

</html>

<script>
    // Hiển thị thời gian thực tế
    function updateTime() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long' };
        const timeString = now.toLocaleDateString('vi-VN', options);
        document.getElementById('current-time').innerText = timeString;
    }

    // Lấy thông tin thời tiết từ OpenWeatherMap
    function updateWeather() {
        const city = "Đà Nẵng";
        const apiKey = "a76dc8a81c2b9be62671b20121a9626a";
        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=Đà+Nẵng&appid=${apiKey}&units=metric&lang=vi`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const weatherInfo = `${city}: ${data.weather[0].description}, ${data.main.temp}°C`;
                document.getElementById('city-weather').innerText = weatherInfo;
            })
            .catch(error => {
                console.error('Error fetching weather data:', error);
                document.getElementById('city-weather').innerText = 'Không thể lấy thông tin thời tiết';
            });
    }

    // Cập nhật thời gian mỗi giây
    setInterval(updateTime, 1000);

    // Cập nhật thông tin thời tiết khi trang được tải
    updateWeather();
</script>