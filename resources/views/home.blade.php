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
		<h2 class="slide-ani">SHM STORE</h2><br>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ducimus autem maxime sit,
			magni adipisci.
		</p>
		<a href="{{route('product')}}">Show More</a>
	</div>
	<div class="home-blk clearfix">
		<a href="{{route('product.category', 'laptop')}}"><img src="frontend/img/home/img_laptop.gif" alt=""></a>
		<a href="{{route('product.category', 'watch')}}"><img src="frontend/img/home/img_watch02.gif" alt=""></a>
		<a href="{{route('product.category', 'smart-phone')}}"><img src="frontend/img/home/img_phone02.gif" alt=""></a>
	</div>
</section>
<!-- /.home-mv -->

<section class="service-row">
	<div class="l-inner">
		<h2 class="service-ttl">Why Shop With Us</h2>
		<div class="service-blk clearfix">
			<div class="service-col">
				<div class="service-icon">
					<svg class="fastDeli-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
						<path class="fastDeli-icon" d="M112 0C85.49 0 64 21.49 64 48V96H16C7.163 96 0 103.2 0 112C0 120.8 7.163 128 16 128H272C280.8 128 288 135.2 288 144C288 152.8 280.8 160 272 160H48C39.16 160 32 167.2 32 176C32 184.8 39.16 192 48 192H240C248.8 192 256 199.2 256 208C256 216.8 248.8 224 240 224H16C7.163 224 0 231.2 0 240C0 248.8 7.163 256 16 256H208C216.8 256 224 263.2 224 272C224 280.8 216.8 288 208 288H64V416C64 469 106.1 512 160 512C213 512 256 469 256 416H384C384 469 426.1 512 480 512C533 512 576 469 576 416H608C625.7 416 640 401.7 640 384C640 366.3 625.7 352 608 352V237.3C608 220.3 601.3 204 589.3 192L512 114.7C499.1 102.7 483.7 96 466.7 96H416V48C416 21.49 394.5 0 368 0H112zM544 237.3V256H416V160H466.7L544 237.3zM160 464C133.5 464 112 442.5 112 416C112 389.5 133.5 368 160 368C186.5 368 208 389.5 208 416C208 442.5 186.5 464 160 464zM528 416C528 442.5 506.5 464 480 464C453.5 464 432 442.5 432 416C432 389.5 453.5 368 480 368C506.5 368 528 389.5 528 416z" />
					</svg>
				</div>
				<div class="service-txt">
					<h4>Fast Delivery</h4>
					<p>
						variations of passages of Lorem Ipsum available
					</p>
				</div>
			</div> <!-- /.service-col -->

			<div class="service-col">
				<div class="service-icon">
					<svg class="fastDeli-svg" enable-background="new 0 0 32 32" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<g id="Layer_1" />
						<g id="Layer_2">
							<g>
								<polyline fill="#d9d8d8" points="    21,24 18,24 18,6 25,6 30,16 30,24 27,24   " stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
								<polyline fill="#d9d8d8" points="    5,24 2,24 2,18 18,18 18,24 11,24   " stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
								<circle cx="24" cy="24" fill="#d9d8d8" r="3" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
								<circle cx="8" cy="24" fill="#d9d8d8" r="3" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
								<path class="fastDeli-icon" d="    M5,14L5,14c-1.1,0-2-0.9-2-2V8c0-1.1,0.9-2,2-2h0c1.1,0,2,0.9,2,2v4C7,13.1,6.1,14,5,14z" fill="#d9d8d8" stroke="#d9d8d8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
								<g>
									<circle fill="#d9d8d8" cx="10.5" cy="6.5" r="1.5" />
								</g>
								<g>
									<circle fill="#d9d8d8" cx="14.5" cy="13.5" r="1.5" />
								</g>
								<line fill="#d9d8d8" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="15" x2="10" y1="6" y2="14" />
								<polyline fill="#d9d8d8" points="    21,6 21,14 29,14   " stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
							</g>
						</g>
					</svg>
				</div>
				<div class="service-txt">
					<h4>Free Shiping</h4>
					<p>
						variations of passages of Lorem Ipsum available
					</p>
				</div>
			</div> <!-- /.service-col -->

			<div class="service-col">
				<div class="service-icon">
					<svg class="best-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
						<path class="best-icon" d="M97.12 362.63c-8.69-8.69-4.16-6.24-25.12-11.85-9.51-2.55-17.87-7.45-25.43-13.32L1.2 448.7c-4.39 10.77 3.81 22.47 15.43 22.03l52.69-2.01L105.56 507c8 8.44 22.04 5.81 26.43-4.96l52.05-127.62c-10.84 6.04-22.87 9.58-35.31 9.58-19.5 0-37.82-7.59-51.61-21.37zM382.8 448.7l-45.37-111.24c-7.56 5.88-15.92 10.77-25.43 13.32-21.07 5.64-16.45 3.18-25.12 11.85-13.79 13.78-32.12 21.37-51.62 21.37-12.44 0-24.47-3.55-35.31-9.58L252 502.04c4.39 10.77 18.44 13.4 26.43 4.96l36.25-38.28 52.69 2.01c11.62.44 19.82-11.27 15.43-22.03zM263 340c15.28-15.55 17.03-14.21 38.79-20.14 13.89-3.79 24.75-14.84 28.47-28.98 7.48-28.4 5.54-24.97 25.95-45.75 10.17-10.35 14.14-25.44 10.42-39.58-7.47-28.38-7.48-24.42 0-52.83 3.72-14.14-.25-29.23-10.42-39.58-20.41-20.78-18.47-17.36-25.95-45.75-3.72-14.14-14.58-25.19-28.47-28.98-27.88-7.61-24.52-5.62-44.95-26.41-10.17-10.35-25-14.4-38.89-10.61-27.87 7.6-23.98 7.61-51.9 0-13.89-3.79-28.72.25-38.89 10.61-20.41 20.78-17.05 18.8-44.94 26.41-13.89 3.79-24.75 14.84-28.47 28.98-7.47 28.39-5.54 24.97-25.95 45.75-10.17 10.35-14.15 25.44-10.42 39.58 7.47 28.36 7.48 24.4 0 52.82-3.72 14.14.25 29.23 10.42 39.59 20.41 20.78 18.47 17.35 25.95 45.75 3.72 14.14 14.58 25.19 28.47 28.98C104.6 325.96 106.27 325 121 340c13.23 13.47 33.84 15.88 49.74 5.82a39.676 39.676 0 0 1 42.53 0c15.89 10.06 36.5 7.65 49.73-5.82zM97.66 175.96c0-53.03 42.24-96.02 94.34-96.02s94.34 42.99 94.34 96.02-42.24 96.02-94.34 96.02-94.34-42.99-94.34-96.02z" />
					</svg>
				</div>
				<div class="service-txt">
					<h4>Best Quality</h4>
					<p>
						variations of passages of Lorem Ipsum available
					</p>
				</div>
			</div> <!-- /.service-col -->

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
					@if( $product->photo )
					<img src="{{ asset('uploads/product/'.$product->photo) }}" alt="{{$product->name}}" class="product-img">
					@else
					<img src="frontend/img/home/img_laptop3.jpg" alt="Dummy Product">
					@endif
				</div>

				<div class="home-pcol1-txt">
					<p class="cmn-p">
						@if($product->offer_price)
						<sup><del>$ {{ number_format($product->original_price) }}</del></sup>
						$ {{ number_format($product->offer_price) }}
						@else
						$ {{ number_format($product->original_price) }}
						@endif
					</p>
					<h5 class="cmn-h5">{{$product->name}}</h5>
					<button class="add-to-cart-btn" data-id="{{ $product->id }}">Add to cart</button>
				</div>
			</li>
			@endforeach
		</ul>
		<div class="viewmore">
			<a href="{{route('product')}}" class="btn-viewmore">View More</a>
		</div>
	</div>
</section> <!-- /.laptop-row -->

<section class="review-row">
	<div class="l-inner">
		<h2 class="cmn-h2">Customer's Reviews</h2>
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
</section> <!-- /.review-row -->
<div class="pagination-blk">
	{{ $feedbacks->links() }}
</div>
</section>
<!-- /.review-row -->

<script>
	var mybutton = document.getElementById("myBtn");

	window.onscroll = function () { scrollFunction() };

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