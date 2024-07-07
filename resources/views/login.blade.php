<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoş Geldiniz</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: url('https://laravel.com/assets/img/welcome/background.svg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .card {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 500px;
            width: 100%;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .btn-custom {
            background-color: #0069d9;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-top: 20px;
            border-radius: 5px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
        }
        .alert ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="text-center mb-4">Hoş Geldiniz</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Adresi</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Emailinizi girin">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Şifre</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Şifrenizi girin">
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-custom">Giriş Yap</button>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Anasayfa</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.querySelector('.alert');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.transition = 'opacity 0.5s ease';
                    alertBox.style.opacity = '0';
                    setTimeout(() => {
                        alertBox.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>
</body>
</html>
