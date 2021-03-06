<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Burn Coffee - Admin</title>

    <base href="{{ asset('/') }}">
    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?=View::make('quantri.menu')?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <?php
                                            $binhluan = DB::table('binhluan')->limit('3')->orderBy('Id_BL', 'DESC')->get();
                                            $sltb = DB::table('binhluan')->where('TT_TB', '=', 1)->get();
                                            $sl = count($sltb);
                                        ?>
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">{{ $sl }}</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>Bình luận mới có : {{ $sl }}</p>
                                            </div>
                                            @foreach ($binhluan as $bl)
                                                @if ($bl->TT_TB == 1)
                                                    <?php $kh = DB::table('khachhang')->where('Id_Kh', '=', $bl->Id_KH)->first();?>
                                                    <form action="/cpTB/{{ $bl->Id_BL }}" method="post">
                                                        @csrf
                                                        <input type="text" style="display: none;" name="TT_TB" value="2">
                                                        <input type="text" style="display: none;" name="Id_TT" value="{{ $bl->Id_TT }}">
                                                        <button type="submit" style="width: 100%">
                                                            <div class="mess__item active1">
                                                                <div class="image img-cir img-40">
                                                                    <img src="assets/images/user.png" alt="Michelle Moreno" />
                                                                </div>
                                                                <div class="content">
                                                                    <h6>{{$kh->Ten_KH}}</h6>
                                                                    <p>{{ $bl->Noi_Dung }}</p>
                                                                    <span class="time">{{ $bl->created_at }}</span>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </form>
                                                @else
                                                    <?php $kh = DB::table('khachhang')->where('Id_Kh', '=', $bl->Id_KH)->first();?>
                                                    <form action="/cpTB/{{ $bl->Id_BL }}" method="post">
                                                        @csrf
                                                        <input type="text" style="display: none;" name="Id_TT" value="{{ $bl->Id_TT }}">
                                                        <button type="submit" style="width: 100%">
                                                            <div class="mess__item">
                                                                <div class="image img-cir img-40">
                                                                    <img src="assets/images/user.png" alt="Michelle Moreno" />
                                                                </div>
                                                                <div class="content">
                                                                    <h6>{{$kh->Ten_KH}}</h6>
                                                                    <p>{{ $bl->Noi_Dung }}</p>
                                                                    <span class="time">{{ $bl->created_at }}</span>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endforeach
                                            <div class="mess__footer">
                                                <a href="{{ route('binhluan.index')}}">Xem</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <?php
                                            $hoadon = DB::table('hoadon')->limit('3')->orderBy('Id_HD', 'DESC')->get();
                                            $slhd = DB::table('hoadon')->where('TT_TB', '=', 1)->get();
                                            $sls = count($slhd);
                                        ?>
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                        <span class="quantity">{{ $sls }}</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>Đơn hàng mới có : {{ $sls }}</p>
                                            </div>
                                            @foreach ($hoadon as $bl)
                                                @if ($bl->TT_TB == 1)
                                                    <?php $kh = DB::table('khachhang')->where('Id_Kh', '=', $bl->Id_KH)->first();?>
                                                    <form action="/cpHD/{{ $bl->Id_HD }}" method="post">
                                                        @csrf
                                                        <input type="text" style="display: none;" name="TT_TB" value="2">
                                                        <input type="text" style="display: none;" name="Id_TT" value="{{ $bl->Id_HD }}">
                                                        <button type="submit" style="width: 100%">
                                                            <div class="mess__item active1">
                                                                <div class="image img-cir img-40">
                                                                    <img src="assets/images/user.png" alt="Michelle Moreno" />
                                                                </div>
                                                                <div class="content">
                                                                    <h6>{{$kh->Ten_KH}}</h6>
                                                                    <p>{{ $bl->Ngay_Dang }}</p>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </form>
                                                @else
                                                    <?php $kh = DB::table('khachhang')->where('Id_Kh', '=', $bl->Id_KH)->first();?>
                                                    <form action="/cpHD/{{ $bl->Id_HD }}" method="post">
                                                        @csrf
                                                        <input type="text" style="display: none;" name="Id_TT" value="{{ $bl->Id_HD }}">
                                                        <button type="submit" style="width: 100%">
                                                            <div class="mess__item">
                                                                <div class="image img-cir img-40">
                                                                    <img src="assets/images/user.png" alt="Michelle Moreno" />
                                                                </div>
                                                                <div class="content">
                                                                    <h6>{{$kh->Ten_KH}}</h6>
                                                                    <p>{{ $bl->Ngay_Dang }}</p>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endforeach
                                            <div class="mess__footer">
                                                <a href="{{ route('hoadon.index')}}">Xem</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image" style="border-radius: 50%">
                                            <img src="assets/images/user.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                {{ Session::get('nhanvien')['Ten_NV'] }}
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="assets/images/user.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">
                                                            {{ Session::get('nhanvien')['Ten_NV'] }}
                                                        </a>
                                                    </h5>
                                                    <span class="email">
                                                        {{ Session::get('nhanvien')['email'] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ url('/logoutad') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-12">
                    <h1>@yield('pagetitle')</h1>
                </div>
            @yield('main')
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>

</body>

</html>
<style>
    .active1{
        background: rgba(107, 182, 243, 0.767);
    }
</style>