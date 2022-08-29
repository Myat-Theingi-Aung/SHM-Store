@extends('../layouts/backend/master')
@section('title')SHM Store | Show Order Details  @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/order.css') }}">
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">SHM Store</h3>
            <button class="cmn-btn"><a href="">{{ $order->status == 0 ? 'Pending' : 'Completed' }}</a></button>
        </div>
        <div class="clearfix">
            <div class="from">
                <table class="shm-table">
                    <tr>
                        <td colspan="3">SHM Store</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>:</td>
                        <td>Yangon</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>09 223223223</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>shmstore@info.com</td>
                    </tr>
                </table>
            </div>
            <div class="to">
                <table class="cus-table">
                    <tr>
                        <td colspan="3">{{ $order->user->name}}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>:</td>
                        <td>Yangon</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>09 223223223</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>shmstore@info.com</td>
                    </tr>
                </table>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            @if($item->product->photo)
                                <img class="product-img" src="{{ asset('uploads/product/'.$item->product->photo) }}" alt="Product Photo">
                            @endif
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price * $item->qty }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">Total</td>
                    <td>{{ $order->total_amt }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection