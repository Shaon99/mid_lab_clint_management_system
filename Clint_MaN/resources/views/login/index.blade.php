@extends('welcome')
@section('content')
<div style="margin-left:10px; color:#420690;" class="mt-2"><h1>Client Management System</h1></div>
<div class="container" style="margin-left:500px;">
<div class="row" style="margin-top:80px;"></div>
<div class=" card bg-dark card-body border-danger text-danger " style="width: 20rem;">
<h4>Login</h4><hr>
<form action="{{route('auth.check')}}" method="post">

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif
@csrf
<div class="form-group ">
<label>Username</label>
<input type="text" style="margin-top:10px;" class="form-control" name="username" placeholder="Enter username" value="{{old('username')}}">
<span class="text-danger">@error('username'){{ $message }} @enderror</span>

</div>
<div class="form-group" style="margin-top:10px;" >
<label>Password</label>
<input type="password" style="margin-top:10px;"  class="form-control" name="password" placeholder="Enter password">
<span class="text-danger">@error('password'){{ $message }} @enderror</span>
</div>
<br>
<button  type="submit" class="btn btn-danger btn-lg btn-block">Sign In</button>
<br>
<br>
<a class="text-white" href="{{route('register')}}">Don't have an account? Create new</a>

</form>
</div>
</div>
@endsection()