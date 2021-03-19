@extends('admin.dashboard')
@section('con')
<div class=" container mt-4" >
  <div class="card-header text-info">
    <center>All Customer</center>
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
        @foreach($cus as $row)
        <tr>
        <td><h4>{{$row->id}}</h4></td>
        <td><h4>{{$row->name}}</h4></td>
        <td><h4>{{$row->username}}</h4></td>
        <td><h4>{{$row->email}}</h4></td>
        <td><h4>{{$row->phone}}</h4></td>
        <td><h4>Customer</h4></td>
        
        <td>
        <a href="{" class="btn btn-md btn-info">Edit</a>
        <a href="" class="btn btn-md btn-danger" >Delete</a>

        </td>

        </tr>
        @endforeach
        </table>
@endsection()
