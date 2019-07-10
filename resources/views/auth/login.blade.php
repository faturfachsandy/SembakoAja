<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Gusem</title>
    <!-- Css Files -->
    <link href="css/root.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: #F5F5F5;
        }
    </style>
</head>
<body>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">GS</h1>
            </div>
            <h3>Selamat Datang Di Aplikasi Gusem</h3>
            <p>Ini adalah aplikasi untuk gudang sembako. </p>
            <p>Silahkan Login Dahulu.</p>
            <form class="m-t" action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="email" value="{{old('email')}}" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">
                    {{ __('Login') }}
                </button>
            </form>
            <p class="m-t"> <small>Nokanel &copy; 2018</small> </p>
        </div>
    </div>
</body>
</html>