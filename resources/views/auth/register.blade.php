<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container-fluid d-flex" style="height: 100vh;">
        <!-- Left Column: Form Section -->
        <div class="col-md-6 d-flex justify-content-center align-items-center bg-white p-5 rounded shadow-sm">
            <div class="w-100" style="max-width: 500px;">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/HOTNEWS360.gif') }}" alt="Logo HOTNEWS360" class="img-fluid" style="max-width: 130px;">
                    <h1 class="h4">Đăng ký</h1>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên đăng nhập <i class="fas fa-user"></i></label>
                        <input type="text" name="name" placeholder="Tên đăng nhập" required class="form-control @error('name') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Họ và tên <i class="fas fa-user-circle"></i></label>
                        <input type="text" name="full_name" placeholder="Họ và tên" required class="form-control @error('full_name') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <i class="fas fa-envelope"></i></label>
                        <input type="email" name="email" placeholder="Email" required class="form-control @error('email') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu <i class="fas fa-lock"></i></label>
                        <input type="password" name="password" placeholder="Mật khẩu" required class="form-control @error('password') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu <i class="fas fa-lock"></i></label>
                        <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required class="form-control @error('password_confirmation') is-invalid @enderror">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        Đăng ký <i class="fas fa-user-plus"></i>
                    </button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-sign-in-alt"></i> Đã có tài khoản? Đăng nhập
                    </a>
                    <a href="{{ route('password.request') }}" class="btn btn-outline-secondary btn-sm ms-2">
                        <i class="fas fa-lock"></i> Quên mật khẩu?
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
        <div class="col-md-6 banner-section" style="background: url('{{ asset('images/giaiphongmiennam.png') }}') no-repeat center center; background-size: cover; height: 100vh;">
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
