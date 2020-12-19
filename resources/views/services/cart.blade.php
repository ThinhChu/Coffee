@extends('../layoutchild')
	@include('services.backG')
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
@if (Session::has('khachhang'))
<link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
<?php
	$cart = \Cart::session(Session::get('khachhang')['Id_KH'])->getContent();
?>
<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate" id="change-cart">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>Sản phẩm</th>
							<th>Giá</th>
							<th>Số lượng</th>
							<th>Tổng</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($cart as $c)
							<?php
								$showsp = DB::table('sanpham')->select('Id_SP', 'Ten_SP', 'urlHinh1', 'Gia')->where('Id_SP', '=', $c->id)->first();
							?>
							<tr class="text-center s" id="sid{{$c->id}}">
								<td class="product-remove"><a href="javascript:" onclick="deleteCart({{$c->id}})"><span class="icon-close"></span></a></td>
								
								<td class="image-prod"><div class="img" style="background-image:url(images/{{ $showsp->urlHinh1 }});"></div></td>
								
								<td class="product-name">
									<h3>{{ $c->name }}</h3>
								</td>
								
								<td class="price">{{ number_format($c->price) }}đ</td>
								<input type="text" class="gia-{{$c->Id_SP}}" value="{{ $c->price }}" name="" id="" style="display: none;">
								
								<td class="quantity">
									<form action="/updb/{{$c->id}}" method="POST" id="updateCart-{{$c->id}}">
										@csrf
										<div class="input-group ">
											<input type="text" id="id" name="id" value="{{ $c->id }}" style="display: none;">
											<input type="text" name="quantity" id="quantity-{{ $c->id }}" class="quantity form-control input-number sl-{{$c->id}}" value="{{ $c->quantity }}" min="1" max="100">
											<button class="btn px-3 py-3 btn-primary h" type="submit"><li class="fas fa-edit"></li></button>
										</div>
									</form>
								</td>
								<td class="total tong-{{$c->Id_SP}}" id="ccc">{{number_format(\Cart::session(Session::get('khachhang')['Id_KH'])->get($c->id)->getPriceSum())}}đ</td>
							</tr>
							{{-- <script>
								$('#updateCart-{{$c->id}}').submit(function (e) { 
									e.preventDefault();
							
									let id = $("#id-{{ $c->id }}").val()
									let quantity = $("#quantity-{{ $c->id }}").val();
	
									$.ajax({
										type: "POST",
										url: "/upd/"+id,
										data: {
											"_token": "{{ csrf_token() }}",
											id:id,
											quantity: quantity,
										},
										success: function (response) {
											if(response){
												$("#change-item-cart").empty();
												$("#change-item-cart").html(response);
												alertify.success('Sản phẩm đã được cập nhật');
											}
										}
									});
								}); 
							</script> --}}
							@endforeach
							
						</tbody>
						</table>
			</div>
		</div>
	</div>
		<div class="row justify-content-end">
			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span class="tong-tien">{{number_format(\Cart::getSubTotal())}}đ</span>
					</p>
				</div>
				<p class="text-center"><a href="/thanh-toan" class="btn btn-primary py-3 px-4">Thanh toán</a></p>
			</div>
		</div>
		
	</div>
</section>
@include('product')
@else
<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
		<div class="col-md-12 ftco-animate">
			<div class="cart-list">
				<table class="table">
					<thead class="thead-primary">
					  <tr class="text-center">
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Sản phẩm</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Tổng</th>
					  </tr>
					</thead>
					<tbody>
					
					</tbody>
				  </table>
			  </div>
		</div>
	</div>
	</div>
</section>
@include('product')
@endif
<style>
	.fa-edit{
		color: #fff;
	}
	.h{
		border-radius: 10% !important;
	}
	.h:hover{
		border: 1px #c49b63 solid !important;
	}
	.h:hover .fa-edit{
		color: #c49b63 !important;
	}
</style>
<script>
    function deleteCart(id) {
        $.ajax({
            type: "GET",
            url: "/del/" + id,
            data: {
                _token : $("input[name=_token]").val()
            },
            success: function (response) {
                $("#sid"+id).remove();
                alertify.error('Sản phẩm đã được xóa');
            }
        });
    }
</script>