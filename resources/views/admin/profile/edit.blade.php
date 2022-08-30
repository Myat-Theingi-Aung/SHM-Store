@extends('../layouts/backend/master')
@section('title')SHM Store | Admin Profile @endsection
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
@section('content')

<div class="card">
  <div class="card-body">
      <div class="ttl clearfix">
          <h3 class="cmn-h3">Profile Edit</h3>
          <button class="cmn-btn"><a href="{{ route('admin.user.profile') }}">Back</a></button>
      </div>
      <hr>
      <form method="POST" action="{{ route('admin.user.profile-update') }}" class="clearfix" enctype="multipart/form-data">
          @csrf
          <div class="l-col">
              <div class="input-gp">
                  <label for="name">Username</label><br>
                  <input type="text" name="name" value="{{ $authUser->name ?? @old('name') }}">
                  <p class="msg">@error('name') {{$message}} @enderror</p>
              </div>
              <div class="input-gp">
                  <label for="phone">Phone</label><br>
                  <input type="text" name="phone" value="{{ $authUser->phone ?? @old('phone') }}">
                  <p class="msg">@error('phone') {{$message}} @enderror</p>
              </div>
              
          </div>
          
          <div class="r-col">
              <div class="input-gp">
                  <label for="email">Email</label><br>
                  <input type="email" name="email" value="{{ $authUser->email ?? @old('email') }}">
                  <p class="msg">@error('email') {{$message}} @enderror</p>
              </div>
              <div class="input-gp">
                <label for="address">Address</label><br>
                <input type="text" name="address" value="{{ $authUser->address ?? @old('address') }}">
                <p class="msg">@error('address') {{$message}} @enderror</p>
              </div>
          </div> 
          <div class="input-gp photo">
            <label for="photo">Image</label>
            <input type="file" name="photo">
            <p class="msg">@error('photo') {{$message}} @enderror</p>
          </div>
          <div class="btn-gp">
              <button class="cmn-btn">Update</button>
          </div>
      </form>
  </div>

  <div class="card-body card-body-pwd">
    <div class="ttl clearfix">
        <h3 class="cmn-h3">Password Edit</h3>
    </div>
    <hr>
    <form method="POST" action="{{ route('admin.user.password-update') }}" class="clearfix" enctype="multipart/form-data">
        @csrf
        <div class="l-col">
            <div class="input-gp">
                <label for="old_password">Old Password</label><br>
                <input type="password" name="old_password" placeholder="* * * * * * * *">
                <p class="msg">@error('old_password') {{$message}} @enderror</p>
            </div>
            <div class="input-gp">
                <label for="password">New Password</label><br>
                <input type="password" name="password" placeholder="* * * * * * * *">
                <p class="msg">@error('password') {{$message}} @enderror</p>
            </div>
            <div class="input-gp">
                <label for="password_confirmation">Confirm Password</label><br>
                <input type="password" name="password_confirmation" placeholder="* * * * * * * *">
                <p class="msg">@error('password_confirmation') {{$message}} @enderror</p>
            </div>
            <div class="btn-gp">
              <button class="cmn-btn">Update Password</button>
          </div>
        </div>
        
    </form>
</div>
</div>



@endsection