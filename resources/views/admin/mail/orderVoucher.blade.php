<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Voucher</title>
    <style>
        table{
            border: 1px solid #00;
        }
    </style>
</head>
<body>
    <section>
        <h3 class="cmn-ttl">
            SHM Store
        </h3>
        <div class="order-info-blk">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>

                <tbody>
                    @php $total_price = 0 @endphp
                    @foreach($cart as $item)
                    @php $total_price += $item['original_price'] * $item['qty'] @endphp
                    <input type="hidden" class="product_id" value="{{ $item['id'] }}">
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            {{ $item['name'] }}
                        </td>
                        <td>{{ $item['qty'] }}</td>
                        <td>{{ $item['original_price'] }} <small class="currency-unit">MMK</small></td>
                        <td>
                            <span class="sub-total">{{ number_format($item['qty'] * $item['original_price']) }}</span>
                            <small style="font-size: 12px;">MMK</small>
                        </td>
                    </tr>
                    @endforeach
                    <input type="hidden" value="{{ $total_price }}" name="total_amt">
                </tbody>

                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Grand Total</td>
                        <td>
                            {{ number_format($total_price) }}
                            <small class="currency-unit">MMK</small>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</body>
</html>