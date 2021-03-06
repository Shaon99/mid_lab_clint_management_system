@extends('admin.dashboard')
@section('con')
<div style="padding-top:20px;">
<center>
    <table>
        <tr>
            <td align="center" style="padding:50px;">
            <div class="card border-success  mb3" style="height:300px;width:250px">
                <div class="card-header text-primary">Total Staff</div>
                    <div class="card-body">
                        <h1 align="center" style="color:#6AA121;font-size:180px;">{{$user}}</h1>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:50px;">
            <div class="card border-info mb3" style="height:300px;width:250px">
                <div class="card-header text-success">Total Sell</div>
                    <div class="card-body">
                        <h1 align="center" style="color:#F75D59; font-size:130px;"></h1>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:50px;">
            <div class="card border-success  mb3" style="height:300px;width:250px">
                <div class="card-header text-info">Total Customer</div>
                    <div class="card-body">
                        <h1 align="center" style="color:#EDE275; font-size:130px;">{{$cus}}</h1>
                    </div>
                </div>
            </td>
           
        </tr>
    </table>
</center>
</div>
@endsection()