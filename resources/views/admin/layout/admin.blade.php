<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @yield('css') <!-- Section để thêm các CSS tùy chỉnh cho từng trang -->
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark text-white" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{ route('admin.news.index') }}" class="list-group-item list-group-item-action">Manage News</a>
                <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action">Manage Categories</a>
                <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action">Manage Users</a>
                <a href="{{ route('admin.comments.index') }}">Quản Lý Bình Luận</a>
                <a href="{{ route('admin.ads.index') }}">Quản Lý Quảng Cáo</a>
                <a href="{{ route('index') }}" class="list-group-item list-group-item-action">Trang Chủ</a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Navbar -->
            <nav>
                <div>
                    <div class="d-flex ms-auto">
                        <span>Welcome, {{ Auth::user()->name }}</span>
                    </div>
                </div>
            </nav>

            <!-- Content Section -->
            <div class="container-fluid mt-4">
                @yield('content') <!-- Nội dung của từng trang -->
            </div>
        </div>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
        // Toggle Sidebar
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-wrapper').classList.toggle('toggled');
            document.getElementById('page-content-wrapper').classList.toggle('toggled');
        });
    </script>

    @yield('scripts') <!-- Section để thêm các JavaScript tùy chỉnh cho từng trang -->
</body>

</html>
