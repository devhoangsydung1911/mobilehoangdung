<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}" />
    <link rel="icon" href="{{ asset('assets/images/icons/iconthumbnail.jpg') }}" type="image/gif" sizes="16x16">

    <title>Đăng ký</title>
</head>

<body>
    <div class="container-login">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route('user.store') }}" class="sign-in-form" method="POST">
                    @csrf
                    <h2 class="title">Đăng ký</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Nhập tên" />
                    </div>
                    <div style="color: red">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Nhập email..." />
                    </div>
                    <div style="color: red">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div style="color: red">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_confirm" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div style="color: red">
                        @error('password_confirm')
                            {{ $message }}
                        @enderror
                    </div>
                    <input type="submit" class="btn" value="Đăng ký" />

                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Chuyển tới trang đăng nhập</h3>
                    <p>
                        Tất cả vì khách hàng
                    </p>
                    <a href="{{ route('login') }}" class="inline-block" id="sign-up-btn">
                        <button class="btn transparent" id="sign-up-btn">
                            Đăng nhập
                        </button>
                    </a>
                </div>
                <img src="assets/images/login/log.svg" class="image" alt="" />
            </div>
        </div>
    </div>
</body>

</html>
