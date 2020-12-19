<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
{{-- <div id="change-item-cart">
    <table class="carts">
        <thead>
            <tr>
                <th></th>
                <th>Tên</th>
                <th>Số Ly</th>
                <th>Giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartitem as $cart)
                <?php
                $sp = DB::table('sanpham')->select('Id_SP', 'urlHinh1')->where('Id_SP', '=', $cart->id)->first();
                ?>
                <tr id="sid{{ $cart->id }}">
<td><img width="70px" height="70px" class="mt-3 mb-3 c" src="./images/{{$sp->urlHinh1}}" alt=""></td>
<td>{{$cart->name}}</td>
<td>{{$cart->quantity}}</td>
<td class="totals">{{ number_format($cart->price) }}đ</td>
<td class="product-remove dl"><a href="javascript:" onclick="deleteCart({{$cart->id}})"><span class="icon-close"></span></a></td>
</tr>
@endforeach
</tbody>
<tbody class="bd2">
    <tr>
        <th class="ml-2 mt-3 mb-3">Tổng tiền:</th>
        <th></th>
        <th></th>
        <th></th>
        <th class="tien">{{number_format(\Cart::getSubTotal())}}đ</th>
    </tr>
</tbody>
</table>
</div> --}}
<div id="change-item-cart" style="display: flex;align-items: center">
    <li class="nav-item cart">
        <a href="{{ url('/gio-hang') }}" class="nav-link d-flex align-items-center">
            <span class="icon icon-shopping_cart"></span>
            <span class="number-cart">
                <small id="slgh">{{$cartitem->count()}}</small>
            </span>
        </a>
        <div class="khung">
            <div >
            <div class="carts">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên</th>
                            <th>Số Ly</th>
                            <th>Giá</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartitem as $cart)
                        <?php
                        $sp = DB::table('sanpham')->select('Id_SP', 'urlHinh1')->where('Id_SP', '=', $cart->id)->first();
                        ?>
                        <tr id="sid{{ $cart->id }}">
                            <td><img width="70px" height="80px" style="object-fit: cover;" class="mt-3 mb-3 c" src="./images/{{$sp->urlHinh1}}" alt=""></td>
                            <td>{{$cart->name}}</td>
                            <td>{{$cart->quantity}}</td>
                            <td class="totals">{{ number_format($cart->price) }}đ</td>
                            <td class="product-remove dl"><a href="javascript:" onclick="deleteCart({{$cart->id}})"><span class="icon-close"></span></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody class="bd2">
                        <tr>
                            <th class="ml-2 mt-3 mb-3">Tổng tiền:</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="tien">{{number_format(\Cart::getSubTotal())}}đ</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="but">
                <a type="submit" href="/thanh-toan" class="btn btn-primary">Thanh toán</a>
            </div>
        </div>
    </li>
</div>
<script>
    function deleteCart(id) {
        $.ajax({
            type: "GET",
            url: "/del/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },
            success: function(response) {
                $("#sid" + id).remove();
                $("#change-item-cart").html(response);
                alertify.error('Sản phẩm đã được xóa');
            }
        });
    }
</script>