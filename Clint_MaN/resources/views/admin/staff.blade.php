@extends('admin.dashboard')
@section('con')
<div class="container">
<a href="{{route('addstaff')}}" class="btn btn-primary mt-3">ADD Staff</a>
<div class=" mt-4" >
  <div class="card-header text-info">
   <center>All Staff</center> 
  </div>

  <table class="table table-dark">
        <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>User Role</th>

        <th>Action</th>
        </tr>
        @foreach($all as $row)
        <tr>
        <td><h4>{{$row->id}}</h4></td>
        <td><h4>{{$row->name}}</h4></td>
        <td><h4>{{$row->username}}</h4></td>
        <td><h4>{{$row->email}}</h4></td>
        <td><h4>{{$row->phone}}</h4></td>
        <td><h4>{{$row->type}}</h4></td>
        
        <td>
        <a href="{{ URL::to('edit/staff/' .$row->id)}}" class="btn btn-md btn-info">View</a>
        <a href="{{ URL::to('delete/staff/' .$row->id)}}" class="btn btn-md btn-danger" >Delete</a>

        </td>

        </tr>
        @endforeach
        </table>
@endsection()
