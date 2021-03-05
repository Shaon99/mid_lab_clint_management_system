@extends('admin.dashboard')
@section('con')
<center>
<div class="container">
<h2  class=" text-primary mt-3">Today {{date("d/m/y")}}</h2>
  <div class="card-header text-success">
   All Attendance
  </div>

  <table class="table table-dark" >
        <tr>
        <th>SL</th>
        <th>Date</th>
        <th>Action</th>
        </tr>
       <tbody>
       <?php
       $sl=1;
       ?>
       @foreach($att as $row)
       <tr>
       <td>{{$sl++}}</td>
       <td>{{$row->edit_date}}</td>
       <td>
        <a href="{{URL::to('edit/attendence/' .$row->edit_date)}}" class="btn btn-md btn-info">Edit</a>
        <a href="{{ URL::to('delete/attendence/' .$row->edit_date)}}" class="btn btn-md btn-danger" >Delete</a>

        </td>
       </tr>
       @endforeach

       <tbody>
</table>
@endsection()