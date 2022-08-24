@extends('layouts.frontend.master')
@section('title')
SHM Store| Home
@endsection
@section('content')

  <button onclick="topFunction()" id="myBtn" class="myBtn" title="Go to top">
    <img src="frontend/img/home/img_up_arrow5.jpg" alt="UpArrow" class="up-img">
  </button>

  <section class="slider-row">
    <ul class="banner-slider pc">      
      <li><img class="pc" src="frontend/img/home/img_bg_18.jpg" alt="bgimage"></li>
      <li><img class="pc" src="frontend/img/home/img_bg14.jpg" alt="bgimage"></li>
      <li><img class="pc" src="frontend/img/home/img_bg_02.jpg" alt="bgimage"></li>
    </ul>
  </section> <!-- /.slider-row -->

  <section class="laptop-row">
    <div class="l-inner">
      <div class="home-ttl">
        <h2 class="cmn-h2">Our Available Products</h2>
      </div>
    
      <ul class="home-product clearfix">
        @foreach($products as $product) 
        <li class="home-pcol1">
          <div class="img-test"> 
          @if( $product->image )
            <img src="{{ asset('uploads/product/'.$product->photo) }}" alt="{{$product->name}}">
          @else
          <img src="frontend/img/home/img_laptop3.jpg" alt="Dummy Product">
          @endif
          </div>
          
          
          <div class="home-pcol1-txt">
            <p class="cmn-p"><sup><del>{{number_format($product->original_price)}} MMK</del></sup>{{number_format($product->offer_price)}} MMK</p>
            <h5 class="cmn-h5">{{$product->name}}</h5>
            <button class="add-to-cart-btn">Add to cart</button>
            <button class="viewmore">View More</button>
          </div>
        </li>
        @endforeach

        
      </ul>
    </div>
  </section> <!-- /.laptop-row -->

  

  <section class="review-row">
    <div class="l-inner">
      <h2 class="cmn-h2">Reviews</h2>
      <div class="home-review clearfix">

      @foreach($reviews as $review)
        <div class="review-col">
          <h3 class="cmn-h3">{{$review->name}}</h3>
          <p class="cmn-p">
            {{$review->message}}
          </p>
        </div>
      @endforeach
        
      </div>
    </div>
  </section> <!-- /.review-row -->

    
@endsection