@extends('../layouts/backend/master')
@section('title')SHM Store | User Profile @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
@section('content')

<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">User Profile</h3>
            {{-- <button class="cmn-btn"><a href="{{ route('admin.user.profile') }}">Back</a></button> --}}
        </div>
        <hr>

        <div class="details-info clearfix">
            <div class="lft">
                <img src="{{ $authUser->getPhotoPath() }}" alt="{{ $authUser->name }}" class="img-user">
            </div>
            <div class="rgt">
                <p class="profile-p"><span class="pdt-ttl">Username</span> <span class="full-col">:</span> {{ $authUser->name }}</p>
                <p class="profile-p"><span class="pdt-ttl">Email</span> <span class="full-col">:</span> {{ $authUser->email}}</p> 
                <p class="profile-p"><span class="pdt-ttl">Phone</span> <span class="full-col">:</span> {{ $authUser->phone }}</p>
                <p class="profile-p"><span class="pdt-ttl">Address</span> <span class="full-col">:</span> {{ $authUser->address }}</p>
                <p class="profile-p"><span class="pdt-ttl">Role</span> <span class="full-col">:</span> {{ $authUser->role }}</p>
                <p class="profile-p"><span class="pdt-ttl">Joined Date</span> <span class="full-col">:</span> {{ $authUser->created_at->toFormattedDateString() }}</p>
            </div>
        </div>
        <div class="product-desc clearfix">
            <button class="cmn-btn profile-update"><a href="{{ route('admin.user.profile-edit') }}">Edit Profile</a></button>
        </div>
    </div>
</div>


@endsection