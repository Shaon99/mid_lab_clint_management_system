@extends('admin.dashboard')
@section('con')
<div class="container" style="margin-left:400px;">
<div class="row" style="margin-top:20px;"></div>
<div class=" card card-body border-success " style="width: 30rem;">
<h4>Add New Staff</h4><hr>
<form action="{{route('staff.save')}}" method="post">
@if(Session::get('success'))
             <div class="alert alert-success">
                {{ Session::get('success') }}
             </div>
           @endif

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif
@csrf
<div class="form-group">
<label>Name</label>
<input type="text" class="mt-1 mb-1 form-control" name="name" placeholder="Enter name" value="{{old('name')}}">
<span class="text-danger">@error('name'){{ $message }} @enderror</span>
</div>
<div class="form-group">
<label>Username</label>
<input type="text" class="mt-1 mb-1 form-control" name="username" placeholder="Enter username" value="{{old('username')}}">
<span class="text-danger">@error('username'){{ $message }} @enderror</span>

</div>
<div class="form-group">
<label>Email</label>
<input type="text" class="mt-1 mb-1 form-control" name="email" placeholder="Enter email"value="{{old('email')}}">
<span class="text-danger">@error('email'){{ $message }} @enderror</span>
</div>
<div class="form-group">
<label>phone</label>
<input type="text" class="mt-1 mb-1 form-control" name="phone" placeholder="Enter phone"value="{{old('phone')}}">
<span class="text-danger">@error('phone'){{ $message }} @enderror</span>

</div>
<div class="form-group">
<label>Password</label>
<input type="password" class="mt-1 mb-1 form-control" name="password" placeholder="Enter password">
<span class="text-danger">@error('password'){{ $message }} @enderror</span>

</div>
<div class="mt-1 mb-1 form-group floating-label-form-group controls">
              <label >User Type</label>
              <select class="mt-1 mb-1 form-control" name="type">
              @foreach($type as $row)
                <option >{{$row->role_name}}</option>
                @endforeach
            
            </select>
           
            </div>
<br>
<button type="submit" class="btn btn-success btn-block">Sign Up</button>


</form>
</div>
</div>
@endsection()