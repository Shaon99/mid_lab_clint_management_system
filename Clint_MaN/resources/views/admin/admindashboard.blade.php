@extends('admin.dashboard')
@section('con')
<div style="padding-top:5px;">
<center>
    <table>
        <tr>
            <td align="center" style="padding:10px;">
            <div class="card text-white bg-primary border-primary  mb3" style="height:200px;width:250px">
                <div class="card-header">Total Staff</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{$user}}</h1>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:30px;">
            <div class="card text-white bg-success border-success mb3" style="height:200px;width:250px">
                <div class="card-header">Total Sell on Physical Store</div>
                    <div class="card-body">
                        <h1  style=" font-size:30px;">{{$sell}} BDT</h1>
                    </div>
                </div>
            </td>
            
            <td align="center" style="padding:30px;">
            <div class="card text-white bg-danger border-danger mb3" style="height:200px;width:250px">
                <div class="card-header">Total Sell on E-commerce</div>
                    <div class="card-body">
                        <h1  style="font-size:30px;">{{$ec}} BDT</h1>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:30px;">
            <div class="card text-white bg-info border-info card-fluie mb3" style="height:200px;width:250px">
                <div class="card-header">Total Amount of Sell</div>
                    <div class="card-body">
                        <h1 align="center" style=" font-size:30px;">{{$Total}} BDT</h1>
                    </div>
                </div>
            </td>
           
        </tr>
        <tr>
        <td align="center" style="padding:30px;">
            <div class="card text-white bg-secondary border-warning card-fluie mb3" style="height:200px;width:250px">
                <div class="card-header text-warning">Total Customer</div>
                    <div class="card-body">
                        <h1 align="center" style="color:#ffff; font-size:30px;">{{$cus}}</h1>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</center>
</div>
@endsection()