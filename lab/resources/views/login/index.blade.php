@extends('welcome')
@section('content')
<div class="container" style="margin-left:400px;">
<div class="row" style="margin-top:120px;"></div>
<div class="col-md-4 col-md-offset-4">
<h4>Login</h4><hr>
<form action="{{route('auth.check')}}" method="post">

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif
@csrf
<div class="form-group">
<label>Username</label>
<input type="text" class="form-control" name="username" placeholder="Enter username" value="{{old('username')}}">
<span class="text-danger">@error('username'){{ $message }} @enderror</span>

</div>
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" name="password" placeholder="Enter password">
<span class="text-danger">@error('password'){{ $message }} @enderror</span>

</div>
<br>
<button type="submit" class="btn btn-success btn-block">Sign In</button>
<br>
<br>
<a href="{{route('register')}}">Don't have an account, create new</a>

</form>
</div>
</div>
@endsection()