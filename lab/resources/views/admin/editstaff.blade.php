@extends('admin.dashboard')
@section('con')

<div class="container" style="margin-left:400px;">
<div class="row" style="margin-top:20px;"></div>
<div class="col-md-4 col-md-offset-4">
<h4>Update User Info</h4><hr>
<form action="{{ url('update/staff/'.$all->id)}}" method="post">
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
<input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$all->name}}">
<span class="text-danger">@error('name'){{ $message }} @enderror</span>
</div>
<div class="form-group">
<label>Username</label>
<input type="text" class="form-control" name="username" placeholder="Enter username" value="{{$all->username}}">
<span class="text-danger">@error('username'){{ $message }} @enderror</span>

</div>
<div class="form-group">
<label>Email</label>
<input type="text" class="form-control" name="email" placeholder="Enter email"value="{{$all->email}}">
<span class="text-danger">@error('email'){{ $message }} @enderror</span>
</div>
<div class="form-group">
<label>phone</label>
<input type="text" class="form-control" name="phone" placeholder="Enter phone"value="{{$all->phone}}">
<span class="text-danger">@error('phone'){{ $message }} @enderror</span>

</div>

<div class="form-group floating-label-form-group controls">
              <label >User Type</label>
              <select class="form-control" name="type">
              @foreach($type as $row)
              <option <?php if($row->role_name == $all->type) echo "selected"; ?>>{{$row->role_name}}</option>

                @endforeach
            
            </select>
           
            </div>
<br>
<button type="submit" class="btn btn-success btn-block">Update</button>


</form>
</div>
</div>
@endsection()