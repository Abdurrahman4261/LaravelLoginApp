<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Yönetimi</title>
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
        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 1200px;
            width: 100%;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .btn-danger {
            background-color: #d9534f;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c9302c;
        }
        .btn-primary {
            background-color: #0275d8;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #025aa5;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .text-danger {
            font-size: 0.875rem;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Kullanıcı Yönetimi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Email</th>
                    <th>Kullanıcı Tipi</th>
                    <th>Sil</th>
                    <th>Güncelle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->user_type == 0)
                                Admin
                            @else
                                Normal
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                @if($user->user_type == 0)
                                    <span class="text-danger">Admin olan kullanıcıları silemezsiniz.</span>
                                @else
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu kullanıcıyı silmek istediğinizden emin misiniz?')">Sil</button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">Güncelle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <a href="{{ route('home') }}" class="btn btn-secondary">Anasayfa</a>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
