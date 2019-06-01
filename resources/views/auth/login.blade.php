<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>ChatRoom – chat messenger</title>
    <link href="{{ asset('chatroom/dist/img/favicon.png') }}" type="image/png" rel="icon">
    <link rel="stylesheet" href="{{ asset('chatroom/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('chatroom/dist/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('chatroom/dist/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('chatroom/dist/css/emoji.css') }}">
    <link rel="stylesheet" href="{{ asset('chatroom/dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('chatroom/dist/css/responsive.css') }}">
</head>
<body class="start">
<main>
    <div class="layout">
        <div class="sign-bg">
            <div class="start">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="register-content">
                                <div class="login-header">
                                    <div class="logo">
                                        <img src="{{ asset('chatroom/dist/img/logo2.png') }}" alt="">
                                    </div>
                                    <h1><i class="ti-key"></i>{{ __('Login') }}</h1>
                                </div>
                                <form class="login-up" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <button class="btn icon"><i class="ti-email"></i></button>
                                    </div>
                                    <div class="form-group">
                                        <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <button class="btn icon"><i class="ti-lock"></i></button>
                                    </div>
                                    <button type="submit" class="btn button">{{ __('Login') }}</button>
                                    <div class="callout">
                                        <span>Sign in with</span>
                                        <ul>
                                            <li><a href="#" title="" class="facebook"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#" title="" class="twitter"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#" title="" class="google"><i class="ti-google"></i></a></li>
                                        </ul>
                                        <span>Don't have account? <a href="{{ route('register') }}">Create Account</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <div class="page-meta">
                                <h2>ChatRoom is a simplest and friendly interface Messagner or plateform.</h2>
                                <span>login now and enjoy!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('chatroom/dist/js/jquery3.3.1.js') }}"></script>
<script src="{{ asset('chatroom/dist/js/vendor/jquery-slim.min.js') }}"></script>
<script src="{{ asset('chatroom/dist/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('chatroom/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('chatroom/dist/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('chatroom/dist/js/script.js') }}"></script>
</body>
</html>