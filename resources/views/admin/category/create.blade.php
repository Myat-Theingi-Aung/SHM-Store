@extends('../layout/backend/master')
@section('title')SHM Store | Category Create View @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">Category Create</h3>
            <button class="cmn-btn"><a href="{{ route('admin.category.index') }}">Back</a></button>
        </div>
        <hr>
        <form action="{{ route('admin.category.store') }}" method="post" class="clearfix" enctype="multipart/form-data">
            @csrf
            
                <div class="input-gp category">
                    <label for="name">Category Name</label><br>
                    <input type="text" name="name" value="{{ @old('name') }}" class="">
                    <p class="msg">{{ $errors->first('name') }}</p>
                </div>
            
            
            <div class="btn-gp">
                <button class="cmn-btn">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection