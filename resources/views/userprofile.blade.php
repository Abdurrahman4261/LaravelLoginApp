<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kullanıcı Profili</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        .profile-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }
        .profile-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: black;
            margin-bottom: 30px;
        }
        .profile-info h2 {
            font-size: 1.6rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .profile-info p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            transition: background-color 0.3s ease;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            padding: 12px 24px;
            border-radius: 50px;
            transition: background-color 0.3s ease;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        .btn-secondary:hover {
            background-color: #444;
            color: white;
        }
        .logout-form {
            margin-top: 30px;
        }
        .back-home {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-title">
                    <h1 class="text-center">KULLANICI PROFİLİ</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-container">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="profile-info">
                        <h2>{{ $user->name }}</h2>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                    <div class="logout-form">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-custom btn-lg" type="submit">Çıkış Yap</button>
                        </form>
                    </div>
                    <div class="back-home">
                        <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">Anasayfa'ya Dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
