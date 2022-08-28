@extends('layouts.frontend.master')
@section('title')
SHM Store| Home Page
@endsection
@section('content')
  <button onclick="topFunction()" id="myBtn" class="myBtn" title="Go to top">
    <img src="frontend/img/home/img_up_arrow5.jpg" alt="UpArrow" class="up-img">
  </button>

  

  <section class="home-mv">
	<img src="frontend/img/home/img_homebg04.jpg" alt="">
	<div class="txt-box">
	<small>Welcome To</small>
	<h2 class="txt" >SHM STORE</h2><br>
	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ducimus autem maxime sit, 
		magni adipisci.
	</p>
	<a href="" >Show More</a>
	</div>
	<div class="home-blk clearfix">  
		<img src="frontend/img/home/img_laptop.gif" alt="" >
		<img src="frontend/img/home/img_watch02.gif" alt="" >
		<img src="frontend/img/home/img_phone02.gif" alt="" >
	</div>
  </section>


   <section class="service-row">
	<div class="l-inner">
		<h2 class="service-ttl">Why Shop With Us</h2>
		<div class="service-blk clearfix">
			<div class="service-col">
				<div class="service-icon">
					<svg class="fastDeli-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
						<path class="fastDeli-icon" d="M112 0C85.49 0 64 21.49 64 48V96H16C7.163 96 0 103.2 0 112C0 120.8 7.163 128 16 128H272C280.8 128 288 135.2 288 144C288 152.8 280.8 160 272 160H48C39.16 160 32 167.2 32 176C32 184.8 39.16 192 48 192H240C248.8 192 256 199.2 256 208C256 216.8 248.8 224 240 224H16C7.163 224 0 231.2 0 240C0 248.8 7.163 256 16 256H208C216.8 256 224 263.2 224 272C224 280.8 216.8 288 208 288H64V416C64 469 106.1 512 160 512C213 512 256 469 256 416H384C384 469 426.1 512 480 512C533 512 576 469 576 416H608C625.7 416 640 401.7 640 384C640 366.3 625.7 352 608 352V237.3C608 220.3 601.3 204 589.3 192L512 114.7C499.1 102.7 483.7 96 466.7 96H416V48C416 21.49 394.5 0 368 0H112zM544 237.3V256H416V160H466.7L544 237.3zM160 464C133.5 464 112 442.5 112 416C112 389.5 133.5 368 160 368C186.5 368 208 389.5 208 416C208 442.5 186.5 464 160 464zM528 416C528 442.5 506.5 464 480 464C453.5 464 432 442.5 432 416C432 389.5 453.5 368 480 368C506.5 368 528 389.5 528 416z"/>
					</svg>
				</div> 
				<div class="service-txt"> 
					<h4>Fast Delivery</h4>
					<p>
						variations of passages of Lorem Ipsum available
					</p>
				</div>	
			</div> 

			<div class="service-col">
				<div class="service-icon">
					<svg class="fastDeli-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
						<path class="fastDeli-icon" d="M112 0C85.49 0 64 21.49 64 48V96H16C7.163 96 0 103.2 0 112C0 120.8 7.163 128 16 128H272C280.8 128 288 135.2 288 144C288 152.8 280.8 160 272 160H48C39.16 160 32 167.2 32 176C32 184.8 39.16 192 48 192H240C248.8 192 256 199.2 256 208C256 216.8 248.8 224 240 224H16C7.163 224 0 231.2 0 240C0 248.8 7.163 256 16 256H208C216.8 256 224 263.2 224 272C224 280.8 216.8 288 208 288H64V416C64 469 106.1 512 160 512C213 512 256 469 256 416H384C384 469 426.1 512 480 512C533 512 576 469 576 416H608C625.7 416 640 401.7 640 384C640 366.3 625.7 352 608 352V237.3C608 220.3 601.3 204 589.3 192L512 114.7C499.1 102.7 483.7 96 466.7 96H416V48C416 21.49 394.5 0 368 0H112zM544 237.3V256H416V160H466.7L544 237.3zM160 464C133.5 464 112 442.5 112 416C112 389.5 133.5 368 160 368C186.5 368 208 389.5 208 416C208 442.5 186.5 464 160 464zM528 416C528 442.5 506.5 464 480 464C453.5 464 432 442.5 432 416C432 389.5 453.5 368 480 368C506.5 368 528 389.5 528 416z"/>
					</svg>
				</div> 
				<div class="service-txt"> 
					<h4>Free Shiping</h4>
					<p>
						variations of passages of Lorem Ipsum available
					</p>
				</div>	
			</div> 

			<div class="service-col">
				<div class="service-icon">
					<svg class="fastDeli-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
						<path class="fastDeli-icon" d="M112 0C85.49 0 64 21.49 64 48V96H16C7.163 96 0 103.2 0 112C0 120.8 7.163 128 16 128H272C280.8 128 288 135.2 288 144C288 152.8 280.8 160 272 160H48C39.16 160 32 167.2 32 176C32 184.8 39.16 192 48 192H240C248.8 192 256 199.2 256 208C256 216.8 248.8 224 240 224H16C7.163 224 0 231.2 0 240C0 248.8 7.163 256 16 256H208C216.8 256 224 263.2 224 272C224 280.8 216.8 288 208 288H64V416C64 469 106.1 512 160 512C213 512 256 469 256 416H384C384 469 426.1 512 480 512C533 512 576 469 576 416H608C625.7 416 640 401.7 640 384C640 366.3 625.7 352 608 352V237.3C608 220.3 601.3 204 589.3 192L512 114.7C499.1 102.7 483.7 96 466.7 96H416V48C416 21.49 394.5 0 368 0H112zM544 237.3V256H416V160H466.7L544 237.3zM160 464C133.5 464 112 442.5 112 416C112 389.5 133.5 368 160 368C186.5 368 208 389.5 208 416C208 442.5 186.5 464 160 464zM528 416C528 442.5 506.5 464 480 464C453.5 464 432 442.5 432 416C432 389.5 453.5 368 480 368C506.5 368 528 389.5 528 416z"/>
					</svg>
				</div> 
				<div class="service-txt"> 
					<h4>Best Quality</h4>
					<p>
						variations of passages of Lorem Ipsum available
					</p>
				</div>	
			</div> 

		</div>
	</div>
  </section>


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
		<h2 class="cmn-h2">Customer's Reviews</h2>
      	<div class="home-review clearfix">
		<ul class="banner-slider pc">
			@foreach($feedbacks as $feedback)
				<li class="review-col">
				<h3 class="cmn-h3">{{$feedback->name}}</h3>
				<p class="cmn-p">
					{{$feedback->message}}
				</p>
				</li>
			@endforeach      
		{{-- <li><img class="pc" src="frontend/img/home/img_bg_18.jpg" alt="bgimage"></li>
		<li><img class="pc" src="frontend/img/home/img_bg14.jpg" alt="bgimage"></li>
		<li><img class="pc" src="frontend/img/home/img_bg_02.jpg" alt="bgimage"></li> --}}
		</ul>
	</div>
  </section> <!-- /.slider-row -->

  {{-- <section class="review-row">
    <div class="l-inner">
      <h2 class="cmn-h2">Reviews</h2>
      <div class="home-review clearfix">

      @foreach($feedbacks as $feedback)
        <div class="review-col">
          <h3 class="cmn-h3">{{$feedback->name}}</h3>
          <p class="cmn-p">
            {{$feedback->message}}
          </p>
        </div>
      @endforeach
        
      </div>
    </div>
  </section>  --}}
  <!-- /.review-row -->

  <script>
    var mybutton = document.getElementById("myBtn");
    
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
    
@endsection
