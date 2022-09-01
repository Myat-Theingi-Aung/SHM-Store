<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Voucher</title>
    <style>
    @font-face {
        font-family: Poppins;
        font-weight: 700;
        font-style: normal;
        src: url('../../font/RobotoCondensed-Bold.ttf');
    }
    
    .cmn-ttl{
        color: #006699;
        font-size: 36px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
    }
         
    table {
        border-collapse: collapse;
        max-width: 1200px;
        color:  rgba(0, 0, 0);
        text-align: center;
        width: 98%;
        margin: 0 auto;
    }

    table thead {
        border-bottom:1px solid rgba(0, 102, 153,0.8) ;
        border-top:1px solid rgba(0, 102, 153,0.8) ;
    }

    table thead tr th{
        font-size: 24px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        padding: 10px 0;
        text-align: center;
    }   

    table tfoot{  
        border-bottom:1px solid rgba(0, 102, 153,0.8) ;
        border-top:1px solid rgba(0, 102, 153,0.8) ;
    }

    table tfoot tr td{
        font-size: 24px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        padding: 10px 0;
        text-align: center;
    }  

    td {
        text-align: left;
        padding: 8px 0;
        text-align: center;
    }
    tr:nth-child(even) {
        background-color:  rgba(0, 102, 153,0.1);
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
                        <td>$ {{ number_format($item['original_price']) }}</td>
                        <td>
                            <span class="sub-total">$ {{ number_format($item['qty'] * $item['original_price']) }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Grand Total</td>
                        <td>
                            $ {{ number_format($total_price) }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</body>
</html>