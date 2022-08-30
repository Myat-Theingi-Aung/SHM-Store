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
              <p class="cmn-p"><sup><del>{{ $product->original_price }} MMK</del></sup>{{ $product->offer_price }} MMK</p>
              <h5 class="cmn-h5">{{ $product->name }}</h5>
              <button class="add-to-cart-btn">Add to cart</button>
              <button class="viewmore">View More</button>
            </div>
          </li>

        @endforeach      
							
		</ul>
		<!-- End all tab -->

    
		
	</div>
</section>



@endsection