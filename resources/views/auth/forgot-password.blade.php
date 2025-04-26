<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quên Mật Khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container-fluid d-flex" style="height: 100vh;">
        <!-- Left Column: Reset Password Form -->
        <div class="col-md-6 d-flex justify-content-center align-items-center bg-white p-5 rounded shadow-sm">
            <div class="w-100">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="Logo HOTNEWS360" class="img-fluid mb-3" style="max-height: 130px;">
                    <h1 class="h4">Quên mật khẩu</h1>
                </div>

                <!-- Hiển thị thông báo lỗi nếu có -->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Hiển thị lỗi email -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('password.request') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <i class="fas fa-envelope"></i></label>
                        <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required class="form-control @error('email') is-invalid @enderror">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        Gửi liên kết đặt lại mật khẩu <i class="fas fa-paper-plane"></i>
                    </button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="btn btn-link">
                        <i class="fas fa-sign-in-alt"></i> Đã có tài khoản? Đăng nhập ngay
                    </a>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('register') }}" class="btn btn-link">
                        <i class="fas fa-user-plus"></i> Chưa có tài khoản? Đăng ký ngay
                    </a>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('index') }}" class="btn btn-link">
                        <i class="fas fa-home"></i> Quay lại Trang chủ
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Column: Banner Section -->
        <div class="col-md-6 banner-section" style="background: url('{{ asset('images/giaiphongmiennam.png') }}') no-repeat center center; background-size: cover;"></div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
