<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<style>
    .add-to-cart{
        border: 1px solid #1c1e1f;
        padding: 5px;
        cursor: pointer;
        transition: .4s;
    }

    .add-to-cart:hover{
        background-color: #1c1e1f;
        color: #fff;
    }

    h1{
        margin: 22px;
        padding: 5px;
        border: 1px solid #1c1e1f;
    }

    a.cart-page{
        margin: 22px;
    }
</style>

<h1>
    Cart
    (<span class="cart-count">{{ session()->has('cart') && count(session()->get('cart')) > 0 ? count(session()->get('cart')) : 0 }}</span>)
</h1>

<a href="{{ route('cart.view') }}" class="cart-page">[ Cart Page ]</a>

<ul>
    @foreach(App\Models\Product::all() as $product)
    <li>
        <p>{{ $product->name }}</p>
        <p>{{ number_format($product->offer_price) }}</p>
        <a class="add-to-cart" data-id="{{ $product->id }}">Add to Cart</a>
    </li>
    <br><hr>
    @endforeach
</ul>

<script src="{{asset('frontend/js/libary/jquery.min.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script>
    $('.add-to-cart').click(function(e){
        e.preventDefault();
        let id = $(this).data('id');

        $.ajax({
            type: 'GET',
            url : '{{ url("/add-to-cart") }}',
            data: { id: id },

            success: function(response){
                let cart_count = Object.keys(response.cart).length;

                if(response.msg == 'success'){
                    toastr.success('Item Added to Your Cart Successfully &nbsp;<i class="fa fa-check-circle"></i>', 'SUCCESS', {
                        closeButton: true,
                        progressBar: true,
                    });
                }else{
                    toastr.error('Item Already Exist in Your Cart &nbsp;<i class="fa fa-exclamation-circle"></i>', 'WARNING', {
                        closeButton: true,
                        progressBar: true,
                    });
                }

                $('.cart-count').html(cart_count);
            }
        })
    })
</script>