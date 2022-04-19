<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/icons/iconthumbnail.jpg') }}" type="image/gif" sizes="16x16">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Dashboard | @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <div class="layout-dashboard">
        <nav class="sidebar slide">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="assets/images/icons/iconthumdnail" alt="" />
                    </span>

                    <div class="text logo-text">
                        <span class="name">MobileStore</span>
                        <!-- <span class="profession">Web developer</span> -->
                    </div>
                </div>

                <i class="bx bx-chevron-right toggle"></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <li class="search-box">
                        <i class="bx bx-search icon"></i>
                        <input type="text" placeholder="Search..." />
                    </li>

                    <ul class="menu-links">
                        {{-- <li class="nav-link">
                            <a href="{{ route('homeDB') }}">
                                <i class="bx bx-home-alt icon"></i>
                                <span class="text nav-text">Trang chủ</span>
                            </a>
                        </li> --}}

                        <li class="nav-link">
                            <a href="{{ route('product') }}">
                                <i class="bx bx-bar-chart-alt-2 icon"></i>
                                <span class="text nav-text">Sản phẩm</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('user') }}">
                                <i class="bx bx-wallet icon"></i>
                                <span class="text nav-text">Người dùng</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('orderadmin') }}">
                                <i class="bx bx-wallet icon"></i>
                                <span class="text nav-text">Mua hàng</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('categories') }}">
                                <i class="bx bx-pie-chart-alt icon"></i>
                                <span class="text nav-text">Thêm sản phẩm</span>
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="bottom-content">
                    <li class="">
                        <a href="#">
                            <i class="bx bx-user icon"></i>
                            <span class="text nav-text">{{ $userAdmin ?? '' }}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('log') }}">
                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>
        <section class="home bg-white">
            <div class="rounded-lg h-screen p-8">
                @yield('dashboard')
            </div>
        </section>
    </div>
    <script>
        const body = document.querySelector("body"),
            sidebar = body.querySelector("nav"),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        });
    </script>


</body>

</html>
