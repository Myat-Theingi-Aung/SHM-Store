<form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
@csrf
    <table>
        <tr>
            <td>
                <label>Name</label><br>
                <input type="text" name="name" value="{{ @old('name', $user->name) }}">
            </td>
            <td>
                <label>Email</label><br>
                <input type="text" name="email" value="{{ @old('name', $user->email) }}">
            </td>
        </tr>

        <tr>
            <td>
                <label>Phone</label><br>
                <input type="text" name="phone" value="{{ @old('phone', $user->phone) }}">
            </td>
            <td>
                <label>Address</label><br>
                <input type="text" name="address" value="{{ @old('address', $user->address) }}">
            </td>
        </tr>

        
    </table>
    <hr>
    <br>

    <table border="1" width=700 style="margin-top: 10px;" id="cartListTable">
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
            Total Amount - <input type="text" value="{{ $total_price }}" name="total_amt">
        </tbody>
        <tfoot>
            <tr align="center" class="grand-total">
                <td></td><td></td>
                <td>Grand Total</td>
                <td><span>{{ number_format($total_price) }}</span> <small>MMK</small></td>
                <td><a href="{{ route('cart.clear') }}">Clear Cart</a></td>
            </tr>
            <tr align="center">
                <td></td><td></td><td></td><td></td>
                <td style="border: none;">
                    <button type="submit">Submit Order</button>
                </td>
            </tr>
        </tfoot>
    </table>

</form>
