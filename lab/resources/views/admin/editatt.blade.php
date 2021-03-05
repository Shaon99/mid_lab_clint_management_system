@extends('admin.dashboard')
@section('con')
<div class="container">
<a href="{{route('all.attendence')}}" class="btn btn-success mt-3">All Attendence</a>
</div>
<center>
<div class="container">
<h2  class=" text-primary mt-3">Update Attendance {{$date->att_date}}</h2>
  <div class="card-header text-success">
   Update Attendance
  </div>

  <table class="table table-dark" >
        <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Role</th>
        <th>Attendance</th>
        </tr>
       <tbody>
       <form action="{{url('/update/attendence')}}" method="post">
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
       @foreach($att as $row)
       <tr>
       <td>{{$row->id}}</td>
       <td>{{$row->name}}</td>
       <td>{{$row->type}}</td>
       <input type="hidden" name="id[]" value="{{$row->id}}">
       <td>
       <input type="radio" required=""<?php if($row->attendence=='present'){
           echo"checked";}?> name="attendence[{{$row->id}}]" value="present">Present 
           &nbsp &nbsp &nbsp &nbsp
       <input type="radio" <?php if($row->attendence=='Absence'){
           echo"checked";}?> name="attendence[{{$row->id}}]" value="Absence">Absence
       </td>
       <input type="hidden" name="att_date" value="{{date('d/m/y')}}">
       <input type="hidden" name="att_year" value="{{date('y')}}">
       <input type="hidden" name="att_month" value="{{date('F')}}">

       </tr>
        @endforeach
     
       </tbody>
        </table>    
        <button  class="btn btn-success">Update Attendance</button> 
        </form>
        </center>
@endsection()
