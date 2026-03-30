<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kas Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 85%;
            max-width: 1000px;
            min-height: 550px;
        }

        .login-left {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .login-right {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-right::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 40%;
            top: -50%;
            left: -50%;
            animation: wave 8s infinite linear;
        }

        @keyframes wave {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .auth-title {
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .auth-subtitle {
            color: #6c757d;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-control {
            padding: 15px 15px 15px 45px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            font-size: 16px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }

        .form-control-icon {
            position: absolute;
            left: 15px;
            top: 15px;
            color: #a0aec0;
            font-size: 18px;
        }

        .btn-login {
            background-color: var(--primary-color);
            border: none;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(67, 97, 238, 0.2);
        }

        .btn-login:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(67, 97, 238, 0.3);
        }

        .app-info {
            position: relative;
            z-index: 1;
        }

        .app-logo {
            font-size: 3rem;
            margin-bottom: 15px;
            color: white;
        }

        .app-name {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .app-description {
            font-size: 1rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .feature-list {
            text-align: left;
            margin-top: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .feature-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 14px;
        }

        @media (max-width: 992px) {
            .login-right {
                display: none;
            }

            .login-container {
                width: 90%;
                max-width: 450px;
            }
        }

        .decoration-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .circle-1 {
            width: 80px;
            height: 80px;
            top: -20px;
            right: -20px;
        }

        .circle-2 {
            width: 40px;
            height: 40px;
            bottom: 30px;
            left: 30px;
        }

        .circle-3 {
            width: 60px;
            height: 60px;
            bottom: -20px;
            right: 30px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="row g-0 h-100">
            <div class="col-lg-6 login-left">
                <h1 class="auth-title">Selamat Datang</h1>
                <p class="auth-subtitle">Silakan masuk ke akun Anda</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group position-relative">
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-login">Masuk</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="text-muted">Sistem Kas Keuangan Karang Taruna RT-08</p>
                </div>
            </div>

            <div class="col-lg-6 login-right">
                <div class="decoration-circle circle-1"></div>
                <div class="decoration-circle circle-2"></div>
                <div class="decoration-circle circle-3"></div>

                <div class="app-info">
                    <div class="app-logo">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <h2 class="app-name">Sistem Kas Keuangan</h2>
                    <p class="app-description">Manajemen keuangan modern untuk Karang Taruna</p>

                    <div class="feature-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <span>Pantau pemasukan dan pengeluaran</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <span>Lihat Anggota</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <span>Keamanan data terjamin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ $errors->first() }}',
                showConfirmButton: true,
                confirmButtonColor: '#4361ee'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
</body>

</html>
