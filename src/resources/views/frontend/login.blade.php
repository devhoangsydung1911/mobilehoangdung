<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}" />
    <link rel="icon" href="{{ asset('assets/images/icons/iconthumbnail.jpg') }}" type="image/gif" sizes="16x16">

    <title>Đăng nhập</title>
</head>

<body>
    <div class="container-login">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route('postlogin') }}" class="sign-in-form" method="POST">
                    @csrf
                    <h2 class="title">Đăng nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="email" placeholder="Nhập email..." />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Nhập mật khẩu..." />
                    </div>
                    <div>
                        @if (session()->has('LG'))
                            <div class="text-red-500">
                                {{ session()->get('LG') }}
                            </div>
                        @endif
                    </div>

                    <input type="submit" value="Đăng nhập" class="btn solid" />

                    <p class="social-text">Hoặc Đăng nhập bằng các nền tảng xã hội</p>
                    <div class="social-media">
                        <a href="{{ route('facebook') }}" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="{{ route('google') }}" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Tất cả vì khách hàng</h3>
                    <p>Tất cả vì khách hàng</p>
                    <a href="{{ route('register') }}" class="inline-block" id="sign-up-btn">
                        <button class="btn transparent" id="sign-up-btn">
                            Đăng ký
                        </button>
                    </a>
                </div>
                <img src="assets/images/login/log.svg" class="image" alt="" />
            </div>
        </div>
    </div>
</body>

</html>
