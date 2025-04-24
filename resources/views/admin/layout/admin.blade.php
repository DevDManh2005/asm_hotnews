<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container-admin">
        <!-- Sidebar -->
        <div class="nav">
            <div class="nav-logo">
                <img src="{{ Auth::user()->avatar ? asset('images/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}" alt="Avatar" width="80" height="80">
            </div>
            <span><b>ADMIN: </b>{{ Auth::user()->full_name }}</span>
            <a href="{{ route('admin.dashboard') }}">Quản Lý</a>
            <a href="{{ route('admin.news.index') }}">Quản Lý Bài Viết</a>
            <a href="{{ route('admin.categories.index') }}">Quản Lý Danh Mục</a>
            <a href="{{ route('admin.users.index') }}">Quản Lý User - Admin</a>
            <a href="{{ route('admin.comments.index') }}">Quản Lý Bình Luận</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <div class="header-admin">
                <nav>
                    <div class="header-logo logo">
                        <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="HOTNEWS360 Logo">
                    </div>
                    <div>
                        <h2>Admin Panel</h2>
                    </div>
                    <div>
                        <a href="{{ route('index') }}">Trang Chủ</a>
                    </div>
                </nav>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>

<style>
    /* Cấu hình cơ bản cho body và html */
body, html {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f6f9; /* Nền sáng, hiện đại và dễ nhìn */
}

/* Container chính của layout */
.container-admin {
    display: flex;
    min-height: 100vh; /* Đảm bảo chiều cao chiếm toàn bộ màn hình */
    padding-left: 50px;
    background-color: #f0f4f8; /* Nền sáng nhẹ cho toàn bộ layout */
}

/* Sidebar */
.nav {
    width: 250px; /* Chiều rộng cố định cho sidebar */
    background-color: #ffffff; /* Màu nền trắng để tạo sự sạch sẽ */
    color: #333; /* Màu chữ tối để dễ đọc */
    padding: 30px 20px;
    display: flex;
    flex-direction: column;
    align-items: center; /* Căn giữa các phần tử trong sidebar */
    box-shadow: 2px 0 12px rgba(0, 0, 0, 0.1); /* Bóng đổ nhẹ cho sidebar */
    height: 100%; /* Chiều cao sidebar bằng với chiều cao của màn hình */
    position: fixed; /* Sidebar cố định */
    top: 0;
    left: 0;
    border-radius: 0 20px 20px 0; /* Bo góc cho sidebar */
}

/* Căn giữa logo avatar */
.nav-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px; /* Khoảng cách dưới logo */
}

/* Căn giữa tên đầy đủ */
.nav span {
    color: #000000;
    font-size: 1.1em;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px; /* Khoảng cách giữa avatar và tên */
}

/* Hiển thị avatar */
.nav img {
    border-radius: 50%;
    margin-bottom: 10px;
    border: 4px solid #fff;
}

/* Các liên kết trong Sidebar */
.nav a {
    color: #000000; /* Màu chữ tối nhưng dễ đọc */
    text-decoration: none;
    padding: 10px;
    margin: 12px 0;
    width: 100%; /* Đảm bảo các liên kết chiếm hết chiều rộng */
    text-align: left;
    border-radius: 8px;
    font-size: 1.1em;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav a:hover {
    background-color: #3498db; /* Màu nền khi hover tươi mới */
    color: #fff; /* Màu chữ sáng hơn khi hover */
    transform: scale(1.05); /* Hiệu ứng phóng to nhẹ khi hover */
}

/* Main Content */
.main-content {
    margin-left: 250px; /* Đảm bảo không bị che khuất bởi Sidebar */
    padding: 30px;
    background-color: #ffffff; /* Nền chính trắng để sáng sủa hơn */
    height: 100vh;
    overflow-y: auto; /* Cho phép cuộn khi nội dung dài */
    box-sizing: border-box;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Bóng đổ mạnh hơn cho phần nội dung */
}

/* Header của Admin Panel */
.header-admin {
    background-color: #3498db; /* Màu nền xanh tươi sáng cho header */
    color: #fff;
    padding: 15px 30px;
    border-radius: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ nhẹ */
    margin-bottom: 30px;
}

.header-logo {
    display: flex;
    justify-content: center;
    align-items: center;
}

.header-logo img {
    width: 100px; /* Kích thước logo vừa phải */
    height: auto;
    object-fit: contain;
}

.header-admin h2 {
    margin: 0;
    font-size: 2em;
    font-weight: bold;
    flex-grow: 1; /* Đảm bảo h2 căn giữa */
    text-align: center; /* Căn giữa tiêu đề */
}

.header-admin nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.header-admin a {
    color: #fff;
    text-decoration: none;
    font-size: 1.1em;
    font-weight: 600;
    transition: color 0.3s ease, transform 0.3s ease;
    margin-left: 15px;
}

.header-admin a:hover {
    color: #1abc9c; /* Màu sáng khi hover */
    transform: scale(1.05); /* Hiệu ứng phóng to nhẹ khi hover */
}


/* Nội dung chính */
.content {
    background-color: #f7f7f7; /* Nền sáng, dễ nhìn hơn */
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
}

/* Phần tử khác trong container-admin */
.container-admin > div {
    flex-grow: 1;
    padding: 20px;
}

/* Các hiệu ứng hover nhẹ nhàng */
.nav a:hover,
.header-admin nav a:hover {
    transform: translateX(5px); /* Di chuyển nhẹ sang phải khi hover */
}

/* Hiệu ứng mượt mà cho các phần tử */
a {
    transition: color 0.3s ease;
}

a:hover {
    color: #ffffff; /* Màu sắc tươi sáng khi hover */
}

/* Thêm hiệu ứng hover mượt mà cho sidebar */
.nav a {
    transition: all 0.3s ease;
}

</style>