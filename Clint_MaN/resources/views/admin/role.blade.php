@extends('admin.dashboard')
@section('con')
<div class="container">
<a href="{{route('addrole')}}" class="btn btn-primary mt-3">ADD Role</a>
<div class="card mt-4" >
  <div class="card-header">
    All Role
  </div>
  @if(Session::get('success'))
             <div class="alert alert-success">
                {{ Session::get('success') }}
             </div>
           @endif
  <table class="table table-responsive">
        <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Action</th>
        </tr>
        @foreach($all as $row)
        <tr>
        <td><h4>{{$row->id}}</h4></td>
        <td><h4>{{$row->role_name}}</h4></td>
        
        <td>
        <a href="{{ URL::to('edit/role/' .$row->id)}}" class="btn btn-md btn-info">Edit</a>
        <a href="{{ URL::to('delete/role/' .$row->id)}}" class="btn btn-md btn-danger" id="delete" >Delete</a>

        </td>

        </tr>
        @endforeach
        </table>
@endsection()
