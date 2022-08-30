@extends('../layouts/backend/master')
@section('title')SHM Store | Show Today Order List @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/order.css') }}">
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">Today Order</h3>
            <button class="cmn-btn"><a href="{{ route('admin.order.index') }}">Back</a></button>
        </div>
        <hr>
        <table>
            <thead>
                <tr class="row">
                    <th>No</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if($orders !=null)
                <tr class="up">
                    <td class="no-data" colspan="7">There is no data</td>
                </tr>
            @else
                @foreach($orders as $order)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->user->phone }}</td>
                        <td>{{ $order->user->address }}</td>
                        <td>
                            <label class="switch">
                                <input class="order-status" type="checkbox" @if( $order->status == 1) checked=true @endif data-id="{{ $order->id }}">
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <div class="btn-div">
                                <button><a href="{{ route('admin.order.show',$order->id) }}">
                                    <svg class="details-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path class="details-icon" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 128c17.67 0 32 14.33 32 32c0 17.67-14.33 32-32 32S224 177.7 224 160C224 142.3 238.3 128 256 128zM296 384h-80C202.8 384 192 373.3 192 360s10.75-24 24-24h16v-64H224c-13.25 0-24-10.75-24-24S210.8 224 224 224h32c13.25 0 24 10.75 24 24v88h16c13.25 0 24 10.75 24 24S309.3 384 296 384z"/>
                                    </svg>
                                </a></button>
                                <form class="col1 orderDeleteForm{{$order->id}}" action="{{ route('admin.order.destroy',$order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="button">
                                            <a href="javascript:;" data-id="{{ $order->id }}" class="del-order-btn">
                                                <svg class="del-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path class="del-icon" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/>
                                                </svg>
                                            </a>
                                        </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach  
            @endif
            </tbody>
        </table>

        @if (count($orders) != 0)
            {{ $orders->onEachSide(1)->links() }}
        @endif
    </div>
</div>
@endsection

