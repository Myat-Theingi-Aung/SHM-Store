@extends('../layouts/backend/master')
@section('title', 'SHM Store | User Edit View')
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
@section('content')

<div class="card">
    <div class="card-body">
        <div class="ttl clearfix">
            <h3 class="cmn-h3">Edit User</h3>
            <button class="cmn-btn"><a href="{{ route('admin.user.index') }}">Back</a></button>
        </div>
        <hr>

        <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="clearfix" enctype="multipart/form-data">
        @csrf
            <div class="l-col">
                <div class="input-gp">
                    <label for="name">Username</label><br>
                    <input type="text" name="name" value="{{ @old('name', $user->name) }}">
                    <p class="msg">{{ $errors->first('name') }}</p>
                </div>
                
                <div class="input-gp">
                    <label for="role">Assign Role</label><br>
                    <select name="role" id="role">
                        <option disabled selected> - Select User Role - </option>
                        @foreach($roles as $role)
                            <option value="{{$role}}" {{ $user->isSelectedEditRole($roles, $user->role, @old('role')) }}>
                                {{ ucwords(strtolower($role)) }}
                            </option>
                        @endforeach
                    </select>
                    <p class="msg">{{ $errors->first('role') }}</p>
                </div>

                <div class="input-gp photo">
                    <label for="photo">User Photo</label><br>
                    <input type="file" name="photo">
                    <p class="msg">{{ $errors->first('photo') }}</p>
                </div>
            </div>
            <div class="r-col">
                <div class="input-gp">
                    <label for="email">Email Address</label><br>
                    <input type="email" name="email" value="{{ @old('email', $user->email) }}">
                    <p class="msg">{{ $errors->first('email') }}</p>
                </div>    
                <div class="input-gp">
                    <label for="phone">Phone Number</label><br>
                    <input type="text" name="phone" value="{{ @old('phone', $user->phone) }}">
                    <p class="msg">{{ $errors->first('phone') }}</p>
                </div>          
                <div class="input-gp brand">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" placeholder="* * * * * * * *">
                    <p class="msg">{{ $errors->first('password') }}</p>
                </div>
            </div>    

            <div class="message">
                <label for="address">User Address</label><br>
                <textarea name="address" id="address" cols="" rows="5">{{ @old('address', $user->address) }}</textarea>
                <p class="msg">{{ $errors->first('address') }}</p>
            </div>

            <div class="btn-gp">
                <button class="cmn-btn">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection