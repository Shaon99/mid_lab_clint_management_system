@extends('sales.dashboard')
@section('con')
<div style="padding-top:20px;">
<center>
    <table>
        <tr>
            <td align="center" style="padding:30px;">
            <div class="card text-white bg-info border-info " style="height:200px;width:250px">
                <div class="card-header">Today Total Sells</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{$data}}</h1>
                    </div>
                </div>
            </td>
     
            <td align="center" style="padding:30px;">
            <div class="card text-white bg-danger border-danger " style="height:200px;width:250px">
                <div class="card-header ">Last 7 Days Total Sells</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{$data5}}</h1>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:30px;">
            <div class="card text-white bg-primary border-primary " style="height:200px;width:250px">
                <div class="card-header ">Most sell Item</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{$data3[0]['product_name']}}</h1>
                    </div>
                </div>
            </td>
            <td align="center" style="padding:30px;">
            <div class="card text-white bg-success border-success " style="height:200px;width:250px">
                <div class="card-header ">Total Sell</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{$data2}} BDT</h1>
                    </div>
                </div>
            </td>
           </tr>
            </table>
 @endsection