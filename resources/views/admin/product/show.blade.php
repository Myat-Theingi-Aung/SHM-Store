@extends('../layout/backend/master')
@section('title')SHM Store | Product Update @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
@section('content')

<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">Product Details</h3>
            <button class="cmn-btn"><a href="{{ route('admin.product.index') }}">Back</a></button>
        </div>
        <hr>

        <div class="details-info clearfix">
            <div class="lft">
                @if($product->photo)
                    <img src="{{ asset('uploads/product/'.$product->photo) }}" alt="Product Photo">
                @endif
            </div>
            <div class="rgt">
                <p><span class="pdt-ttl">Product ID</span> <span class="full-col">:</span> {{ $product->id }}</p>
                <p><span class="pdt-ttl">Product Name</span> <span class="full-col">:</span> {{ $product->name }}</p>
                <p><span class="pdt-ttl">Category Name</span> <span class="full-col">:</span> {{ $product->category ? $product->category->name : 'No Category' }}</p> 
                <p><span class="pdt-ttl">Brand</span> <span class="full-col">:</span> {{ strtoupper($product->brand) }}</p>
                <p><span class="pdt-ttl">Original Price</span> <span class="full-col">:</span> {{ number_format($product->original_price) }} MMK</p>
                <p><span class="pdt-ttl">Offer Price</span> <span class="full-col">:</span> {{ number_format($product->offer_price) }} MMK</p>
                <p><span class="pdt-ttl">Created Date</span> <span class="full-col">:</span> {{ $product->created_at->toFormattedDateString() }}</p>
            </div>
        </div>
        <div class="product-desc clearfix">
            <p class="lft">Desctiption &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</p> 
            <p class="rgt">{{ $product->description }}</p>
        </div>
    </div>
</div>

@endsection