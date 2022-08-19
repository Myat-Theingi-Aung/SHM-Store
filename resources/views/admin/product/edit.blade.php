@extends('../layout/backend/master')
@section('title')SHM Store | Product Update @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">Product Edit</h3>
            <button class="cmn-btn"><a href="{{ route('admin.product.index') }}">Back</a></button>
        </div>
        <hr>
        <form action="#" class="clearfix" enctype="multipart/form-data">
            @csrf
            <div class="l-col">
                <div class="input-gp">
                    <label for="name">Product Name</label><br>
                    <input type="text" name="name" value="{{ $product->name }}">
                    <p class="msg">@error('name') {{$message}} @enderror</p>
                </div>
                <div class="input-gp">
                    <label for="original_price">Original Price</label><br>
                    <input type="text" name="original_price" value="{{ $product->original_price }}">
                    <p class="msg">@error('original_price') {{$message}} @enderror</p>
                </div>
                <div class="input-gp photo">
                    <label for="photo">Product Image</label><br>
                    <input type="file" name="photo" value="{{ $product->photo }}">
                    <p class="msg">@error('photo') {{$message}} @enderror</p>
                </div>
            </div>
            <div class="r-col">
                <div class="input-gp">
                    <label for="offer_price">Offer Price</label><br>
                    <input type="text" name="offer_price" value="{{ $product->offer_price }}">
                    <p class="msg">@error('offer_price') {{$message}} @enderror</p>
                </div>
                <div class="input-gp brand">
                    <label for="brand">Product Brand</label><br>
                    <input type="text" name="brand" value="{{ $product->brand }}">
                    <p class="msg">@error('brand') {{$message}} @enderror</p>
                </div>
                <div class="input-gp">
                    <label for="category_name">Category Name</label><br>
                    <select name="category_name" id="">
                        @foreach($data as $d)
                            <option value="{{$d->id}}"> {{$d->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>    
            <div class="message">
                <label for="description">Product Description</label><br>
                <textarea name="description" id="" cols="119" rows="5">{{ $product->description }}</textarea>
                <p class="msg">@error('description') {{$message}} @enderror</p>
            </div>
            <div class="btn-gp">
                <button class="cmn-btn">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection