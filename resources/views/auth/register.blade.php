<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Talkshak – chat messenger</title>
    <link href="{{ asset('talkshak/dist/img/favicon.png') }}" type="image/png" rel="icon">
    <link rel="stylesheet" href="{{ asset('talkshak/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('talkshak/dist/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('talkshak/dist/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('talkshak/dist/css/emoji.css') }}">
    <link rel="stylesheet" href="{{ asset('talkshak/dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('talkshak/dist/css/responsive.css') }}">
</head>
<body class="start">
<main>
    <div class="layout">
        <div class="sign-bg">
            <div class="start">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="register-content">
                                <div class="login-header">
                                    <div class="logo">
                                        <img src="{{ asset('talkshak/dist/img/logo2.png') }}" alt="">
                                    </div>
                                    <h1><i class="ti-key"></i>{{ __('Register') }}</h1>
                                </div>
                                <form class="login-up" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" id="inputuser" class="form-control" placeholder="User Name" required>
                                        <button class="btn icon"><i class="ti-user"></i></button>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email Address" required>
                                        <button class="btn icon"><i class="ti-email"></i></button>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                        <button class="btn icon"><i class="ti-lock"></i></button>
                                    </div>
                                    <button type="submit" class="btn button">{{ __('Register') }}</button>
                                    <div class="callout">
                                        <span>Sign up with</span>
                                        <ul>
                                            <li><a href="#" title="" class="facebook"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#" title="" class="twitter"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#" title="" class="google"><i class="ti-google"></i></a></li>
                                        </ul>
                                        <span>Already have account? <a href="{{ route('login') }}">Click Here</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-8">
                            <div class="page-meta">
                                <h2>Talkshak is a simplest and friendly interface Messagner or plateform.</h2>
                                <span>login now and enjoy!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('talkshak/dist/js/jquery3.3.1.js') }}"></script>
<script src="{{ asset('talkshak/dist/js/vendor/jquery-slim.min.js') }}"></script>
<script src="{{ asset('talkshak/dist/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('talkshak/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('talkshak/dist/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('talkshak/dist/js/script.js') }}"></script>
</body>
</html>