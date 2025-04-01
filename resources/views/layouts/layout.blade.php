<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <header class="header">
        <!-- Logo -->
        <div class="header-logo">
            <img src="{{ asset("images/HOTNEWS360.gif") }}" alt="HOTNEWS360 Logo">
        </div>
    
        <!-- Menu và Form tìm kiếm -->
        <div class="header-content">
            <!-- Menu -->
            <div class="header-left">
                <ul>
                    <li><a href="/about">Giới Thiệu</a></li>
                    <li><a href="/contact">Liên Hệ</a></li>
                    <li><a href="/quangcao">Quảng Cáo</a></li>
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
        <ul>
            <li><a href="/">Trang Chủ</a></li>
            <li><a href="#">Tin Tức</a></li>
            <li><a href="#">Bóng Đá</a></li>
            <li><a href="#">Ngoại Hạng Anh</a></li>
            <li><a href="#">Kinh Doanh</a></li>
            <li><a href="#">Giải Trí</a></li>
            <li><a href="#">Sức Khỏe</a></li>
            <li><a href="#">Hi-Tech</a></li>
            <li><a href="#">Thế Giới</a></li>
            <li><a href="#">Thể Thao</a></li>
            <li><a href="#">Ô TÔ</a></li>
            <li><a href="#">Phái Đẹp</a></li>
        </ul>
    </nav>
    <main class="content">
        <article>@yield('noidung')</article>
        <aside>
            <h2>Các Mẫu Quảng Cáo Đã Thực Hiện</h2>
            <div class="ad-sample-list">
                <!-- Mẫu quảng cáo 1 -->
                <div class="ad-sample-item">
                    <img src="https://via.placeholder.com/300x300?text=Banner+Ad" alt="Mẫu quảng cáo Banner">
                    <h3>Quảng cáo Banner</h3>
                    <p>Mẫu quảng cáo banner hiển thị ở đầu trang web.</p>
                    <a href="#">Xem chi tiết</a>
                </div>
        
                <!-- Mẫu quảng cáo 2 -->
                <div class="ad-sample-item">
                    <img src="https://via.placeholder.com/300x300?text=Pop-up+Ad" alt="Mẫu quảng cáo Pop-up">
                    <h3>Quảng cáo Pop-up</h3>
                    <p>Mẫu quảng cáo pop-up xuất hiện khi người dùng truy cập.</p>
                    <a href="#">Xem chi tiết</a>
                </div>
        
                <!-- Mẫu quảng cáo 3 -->
                <div class="ad-sample-item">
                    <img src="https://via.placeholder.com/300x300?text=Video+Ad" alt="Mẫu quảng cáo Video">
                    <h3>Quảng cáo Video</h3>
                    <p>Mẫu quảng cáo video ngắn gọn, hấp dẫn.</p>
                    <a href="#">Xem chi tiết</a>
                </div>
        
                <!-- Mẫu quảng cáo 4 -->
                <div class="ad-sample-item">
                    <img src="https://via.placeholder.com/300x300?text=Social+Media+Ad" alt="Mẫu quảng cáo Social Media">
                    <h3>Quảng cáo trên mạng xã hội</h3>
                    <p>Mẫu quảng cáo tối ưu hóa cho Facebook, Instagram.</p>
                    <a href="#">Xem chi tiết</a>
                </div>
        
                <!-- Mẫu quảng cáo 5 -->
                <div class="ad-sample-item">
                    <img src="https://via.placeholder.com/300x300?text=Native+Ad" alt="Mẫu quảng cáo Native">
                    <h3>Quảng cáo Native</h3>
                    <p>Mẫu quảng cáo tích hợp tự nhiên vào nội dung trang web.</p>
                    <a href="#">Xem chi tiết</a>
                </div>
            </div>
        </aside>
    </main>
    <footer class="footer">
        <h3>Lê Đức Mạnh</h3>
    </footer>
</body>
</html>