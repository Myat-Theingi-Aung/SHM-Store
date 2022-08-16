<h1>Home Page</h1>
@guest
<a href="{{ route('login') }}">LOGIN</a>
<a href="{{ route('register') }}">REGISTER</a>
@else
<a href="{{ route('logout') }}">LOGOUT</a>
@endguest


<ul>
    @foreach($products as $product)
    <li>{{ $product->name }}</li>
    @endforeach
</ul>