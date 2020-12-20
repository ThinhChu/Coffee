<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
@extends('layoutchild')
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <section class="ftco-section mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8   ftco-animate">

<form action="/postlaylaimk" method="POST">
    @csrf
    <h3 class="mb-4 billing-heading">Lấy lại mật khẩu</h3>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Nhập mật khẩu mới</label>
            <input type="password" id="password" class="form-control" name="password" >
            <input type="hidden" name="idkh" id="idkh" value="{{$id}}">
            <span class="form-message"></span>
        </div>
    </div>
    <button type="submit" class="btn btn-primary py-3 px-4">Nhập</button>
</form>
</div>
</div>
</div>
</section>  