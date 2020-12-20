@extends('quantri.layoutquantri')
@section('pagetitle', 'BẢNG ĐIỀU KHIỂN')
@section('main')
    <div class="section__content">
        <div class="container-fluid">
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <?php
                                    $kh = DB::table('khachhang')->get();
                                    $skh = count($kh);
                                ?>
                                <div class="text">
                                    <h2>{{ $skh }}</h2>
                                    <span>Tổng khách hàng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                                <?php
                                    $hd = DB::table('hoadon')->get();
                                    $shd = count($hd);
                                ?>
                                <div class="text">
                                    <h2>{{$shd}}</h2>
                                    <span>Tổng hóa đơn</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-comment-more"></i>
                                </div>
                                <?php
                                    $bl = DB::table('binhluan')->get();
                                    $sbl = count($bl);
                                ?>
                                <div class="text">
                                    <h2>{{$sbl}}</h2>
                                    <span>Tổng bình luận</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-coffee"></i>
                                </div>
                                <?php
                                    $sp = DB::table('sanpham')->get();
                                    $ssp = count($sp);
                                ?>
                                <div class="text">
                                    <h2>{{$ssp}}</h2>
                                    <span>Tổng sản phẩm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .overview-box .text {
    font-weight: 300;
    display: contents !important;
}
</style>