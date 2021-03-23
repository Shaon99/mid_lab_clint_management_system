@extends('welcome')
@section('content')
<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a style="margin-left:15px;" class="navbar-brand font-weight-bold" href="/saledashboard">Dashboard</a>
    <a style="margin-left:15px;"class="navbar-brand font-weight-bold" href="/ecommerce">E-commerce</a>
    <a style="margin-left:15px;"class="navbar-brand font-weight-bold" href="/physicalstore">Physical Store</a>
    <a style="margin-left:15px;"class="navbar-brand font-weight-bold" href="/product">Product</a>
    <a style="margin-left:15px;"class="navbar-brand font-weight-bold" href="/sell">Sold</a>
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

 <div class="btn btn-danger my-2 my-sm-0 " style="margin-left:452px;">
 
     <a class="text-light"style="text-decoration: none;" href="/logout">Logout</a>
   </div>
</nav>
@yield('con')
@endsection()
