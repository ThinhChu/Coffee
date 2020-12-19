<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<form id="quenmk">
    @csrf
    <label for="">Nhập email của bạn</label>
    <input type="email" id="email" name="email">
    <button type="submit">Nhập</button>
</form>
<?php
    $kh = DB::table('khachhang')->get();
?>
<script>
    $('#quenmk').submit(function(e) {
        e.preventDefault();
        let email = $("#email").val();
        let kh = {!!$kh!!};
        
        $.ajax({
            type: "POST",
            url: "{{route('qmk.add')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                email: email,
            },
            success: function(response) {
                for (let i = 0; i < kh.length; i++) {
                    if ((kh[i]['email']) === email) {
                        alertify.success('Vui lòng kiểm tra email');
                        
                    }
                        alertify.error('Nhập lại email đúng');
                }
            }
        });
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