@extends('welcome')
@section('content')
<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a style="margin-left:15px;" class="navbar-brand font-weight-bold" href="/dashboard">Dashboard</a>
    <a style="margin-left:15px;"class="navbar-brand font-weight-bold" href="{{route('staff')}}">Manage Staff</a>
    <a style="margin-left:15px;"class="navbar-brand font-weight-bold" href="/attendence">Manage Attendence</a>
    <a style="margin-left:15px;"class="navbar-brand font-weight-bold" href="">Manage Customer</a>
    <a style="margin-left:15px;"class="navbar-brand font-weight-bold" href="{{route('role')}}">Role</a>
    <div style="margin-left:15px;" class="btn btn-light  my-4 my-sm-0 ">  
    <style>
    li{
      color:Green;
    }
    span{
      color:black;      
    }
    </style>
    <li><span>{{$LoggedUserInfo->name}}</span></li>
    </div>

 <div class="btn btn-danger my-2 my-sm-0 " style="margin-left:420px;">
 
     <a class="text-light"style="text-decoration: none;" href="/logout">Logout</a>
   </div>
</nav>
@yield('con')
@endsection()