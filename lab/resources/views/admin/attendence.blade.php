@extends('admin.dashboard')
@section('con')
<div class="container">
<a href="{{route('all.attendence')}}" class="btn btn-success mt-3">All Attendence</a>
</div>
<center>
<div class="container">
<h2  class=" text-primary mt-3">Today {{date("d/m/y")}}</h2>
  <div class="card-header text-success">
   Take Attendance
  </div>

  <table class="table table-dark" >
        <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Role</th>
        <th>Attendance</th>
        </tr>
       <tbody>
       <form action="{{route('take.attendence')}}" method="post">
       @if(Session::get('success1'))
             <div class="alert alert-danger">
                {{ Session::get('success1') }}
             </div>
           @endif
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
       @foreach($all as $row)
       <tr>
       <td>{{$row->id}}</td>
       <td>{{$row->name}}</td>
       <td>{{$row->type}}</td>
       <input type="hidden" name="user_id[]" value="{{$row->id}}">
       <td>
       <input type="radio" required="" name="attendence[{{$row->id}}]" value="Present">Present &nbsp &nbsp &nbsp &nbsp
       <input type="radio" name="attendence[{{$row->id}}]" value="Absence">Absence
       </td>
       <input type="hidden" name="att_date" value="{{date('d/m/y')}}">
       <input type="hidden" name="att_year" value="{{date('y')}}">
       <input type="hidden" name="att_month" value="{{date('F')}}">

       </tr>
        @endforeach
     
       </tbody>
        </table>    
        <button  class="btn btn-success">Take Attendance</button> 
        </form>
        </center>
@endsection()
