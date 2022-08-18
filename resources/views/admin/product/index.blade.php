@extends('../layout/backend/master')
@section('title')SHM Store | Show Product List @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">Product List</h3>
            <button class="cmn-btn"><a href="{{ route('admin.product.create') }}">Create</a></button>
        </div>
        <hr>
        <table>
            <thead>
                <tr class="row">
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Brand</th>
                    <th>Original Price</th>
                    <th>Offer Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ number_format($product->original_price) }} MMK</td>
                    <td>{{ number_format($product->offer_price) }} MMK</td>
                    <td>
                        <div class="btn-div clearfix">
                            <div class="col2">
                                <button><a href="{{ route('admin.product.edit',$product->id) }}">Detail</a></button>
                            </div>
                            <div class="col2">
                                <button><a href="{{ route('admin.product.edit',$product->id) }}">Edit</a></button>
                            </div>
                            <form class="col1" action="{{ route('admin.product.destroy',$product->id) }}"  method="post">
                                @csrf
                                @method('delete')
                                <button class="btn" onclick="return confirm('Are you sure you want to delete - {{ $product->name }} ?');">Delete</button>
                            </form>
                            
                        </div>
                    </td>
                </tr>
            @endforeach      
            </tbody>
        </table>
    </div>
</div>

@endsection