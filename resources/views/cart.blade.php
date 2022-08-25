<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<div align="center" style="margin-top: 50px;" >
    <a href="{{ route('product') }}">[ Back to Product Page ]</a>
    &nbsp;
    <a href="{{ route('login') }}">Login</a>
</div>

<table border="1" width=700 align="center" style="margin-top: 30px;" id="cartListTable">
    <thead>
        <tr>
            <th><font color="crimson">Product Name</font></th>
            <th><font color="crimson">Unit Price</font></th>
            <th><font color="crimson">Qty</font></th>
            <th><font color="crimson">Sub Total</font></th>
            <th><font color="crimson">Action</font></th>
        </tr>
    </thead>

    <tbody>
        @php $total_price = 0 @endphp
        @foreach($cart as $key => $item)
        @php $total_price += $item['offer_price'] * $item['qty'] @endphp
        <tr align="center" class="cart-item-list">
            <input type="hidden" class="product_id" value="{{ $item['id'] }}">
            <td>{{ $item['name'] }}</td>
            <td>
                <span>{{ ($item['offer_price']) }}</span>
                <small style="font-size: 14px;">MMK</small>
            </td>
            <td class="cart-qty">
                <a href="" class="cart-dec update-cart">&minus;</a>
                <input type="text" disabled class="qty" value="{{ $item['qty'] }}">
                <a href="" class="cart-inc update-cart">&plus;</a>
            </td>
            <td>
                <span class="sub-total">{{ number_format($item['qty'] * $item['offer_price']) }}</span>
                <small style="font-size: 14px;">MMK</small>
            </td>
            <td>
                <a href="{{ route('cart.remove', $item['id']) }}">Remove</a>
            </td>
        </tr>
        @endforeach
    </tbody>


    <tfoot>
        <tr align="center" class="grand-total">
            <td></td>
            <td></td>
            <td>Grand Total</td>
            <td><span>{{ number_format($total_price) }}</span> <small>MMK</small></td>
            <td><a href="{{ route('cart.clear') }}">Clear Cart</a></td>
        </tr>

        <tr align="center">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                @auth
                    <a href="{{ route('checkout') }}">[ Checkout ]</a>
                @else
                    <a href="javascript:;" onclick="toastr.error('You Need to Login First', 403)">[ Checkout ]</a>
                @endauth
            </td>
        </tr>
    </tfoot>
</table>



<script src="{{asset('frontend/js/libary/jquery.min.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script>
    $('.cart-dec').click(function(e){
        e.preventDefault();
        let qty   = $(this).parent('.cart-qty').find('.qty').val();
        let value = parseInt(qty, 10);
        value     = isNaN(value) ? 0 : value;

        if(value > 1){
            value--;
            $(this).parent('.cart-qty').find('.qty').val(value);
        }
    });
    
    $('.cart-inc').click(function(e){
        e.preventDefault();
        let qty   = $(this).parent('.cart-qty').find('.qty').val();
        let value = parseInt(qty, 10);
        value     = isNaN(value) ? 0 : value;

        if(value < 10){
            value++;
            $(this).parent('.cart-qty').find('.qty').val(value);
        }
    });

    $('.update-cart').click(function(e){
        let thisEl = $(this);
        console.log(thisEl);

        let id  = $(this).closest('.cart-item-list').find('.product_id').val();
        let qty = $(this).closest('.cart-item-list').find('.qty').val();

        $.ajax({
            type: 'GET',
            url : '{{ url("/update-cart") }}',
            data: { id: id, qty: qty },

            success: function(response){
                console.table(response);
                thisEl.closest('.cart-item-list').find('.sub-total').text(response.sub_total);
                $('#cartListTable tfoot').load(location.href + ' .grand-total');
            }
        })
    })
</script>