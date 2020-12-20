
@extends('layoutchild')
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <section class="ftco-section mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8   ftco-animate">
<form id="quenmk">
    @csrf
    <h3 class="mb-4 billing-heading">Quên mật khẩu</h3>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Nhập email của bạn</label>
            <input type="email" id="email" class="form-control" name="email" >
            <span class="form-message"></span>
        </div>
    </div>
    <button type="submit" class="btn btn-primary py-3 px-4">Nhập</button>
</form>
</div>
</div>
</div>
</section>
<?php
    $kh = DB::table('khachhang')->get();
?>
<script>
    // $("#quenmk").click(function (e) { 
    //     e.preventDefault();
    //     var layemail = document.querySelector("#email").value;
    //     console.log(layemail);
    // });
    
    $('#quenmk').submit(function(e) {
        e.preventDefault();
        let email = $("#email").val();
        let kh = {!!$kh!!};
        for (let i = 0; i < kh.length; ++i) {
            if(kh[i]['email'] = email){
                $.ajax({
                    type: "POST",
                    url: "{{route('qmk.add')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        email: email,
                    },
                    success: function(response) {
                        $("#email").val('');
                        alertify.success('Vui lòng kiểm tra email');
                        
                    }
                });
                break;
            }
            else{
                alertify.success('đasdasdass');
                break;
            }
            
        }
        
        
        
        // $.ajax({
        //     type: "POST",
        //     url: "{{route('qmk.add')}}",
        //     data: {
        //         "_token": "{{ csrf_token() }}",
        //         email: email,
        //     },
        //     success: function(response) {
        //         for (let i = 0; i < kh.length; i++) {
        //             if ((kh[i]['email']) = email) {
        //                 $("#email").val('');
        //                 alertify.success('Vui lòng kiểm tra email');
        //                 break;
        //             }else{
        //                 alertify.error('Nhập lại email đúng');
        //                 break;
        //             }
        //         }
        //     }
        // });
    });

</script>
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