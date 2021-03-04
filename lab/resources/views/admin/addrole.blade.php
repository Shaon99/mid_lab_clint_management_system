@extends('admin.dashboard')
@section('con')

<div class=" container mt-3">
      <div class="col-lg-12 mx-auto " style="padding:auto;">
     
    
    
        <form action="{{route('role.save')}}" method="POST" >
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
       @csrf
       
    <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label ><h4>Role Name</h4></label>
              <input type="text" class="form-control"style="font-size:20px;font-weight: bold;" placeholder="Enter role Name" name="name" >
              <span class="text-danger">@error('name'){{ $message }} @enderror</span>

            </div>          
  </div>
  
  
          <div class="mt-3">
          <button type="submit" class="btn btn-success " >Submit</button>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection()