@extends('layouts.frontend.master')
@section('title')
SHM Store| Product
@endsection
@section('content')
<section class="box-container">
	<div class="l-inner">
		<ul class="ttl-box clearfix">
      <li class="ttl-list">
        <a href="{{ route('product') }}" 
        class="category-tab-link">
          All Products
        </a>
      </li>
      @foreach($categories as $category)
      <li class="ttl-list">
        <a href="{{ route('product.category', $category->id) }}"
        class="category-tab-link {{ Request::is('product/'.$category->id) ? 'tab-active' : '' }}">
          {{$category->name}}
        </a>
      </li>
      @endforeach
    </ul>

		<!-- all tab -->
		<ul class="item-box clearfix"> 
        @foreach($products as $product)
          <li class="item-list">
            <div class="image">
            @if($product->photo)
            <img src="{{ asset('uploads/product/'.$product->photo) }}" alt="{{ $product->name }}">
            @else
            <img src="{{ asset('frontend/img/home/img_laptop3.jpg') }}" alt="Dummy Product Image">
            @endif
            </div>
            <div class="item-txt">
              <p class="cmn-p">
                @if($product->offer_price)
                <sup><del>$ {{ number_format($product->original_price) }}</del></sup>
                $ {{ number_format($product->offer_price) }} 
                @else
                $ {{ number_format($product->original_price) }}
                @endif
              </p>
              <h5 class="cmn-h5">{{ $product->name }}</h5>
              <button class="add-to-cart-btn add-to-cart" data-id="{{ $product->id }}">
                Add to Cart
              </button>
    
            </div>
          </li>

        @endforeach      
							
		</ul>
		<!-- End all tab -->
    <div class="pagination-blk">
      {{ $products->links() }}
    </div>
		
	</div>
</section>



@endsection