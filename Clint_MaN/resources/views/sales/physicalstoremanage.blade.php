@extends('sales.dashboard')
@section('con')
<div class="mt-3" style="margin-left:10px" >  <a class="btn btn-success" href="/physicalstore/sold">View Sales</a>
<span><a class="btn btn-success" href="{{ route('SalesController.sales') }}">Sell Product</a></span>                
</div>
<div style="padding-top:10px;">
<center>
    <table>
        <tr>
            <td align="center" >
            <div class="card text-white bg-primary border-primary " style="height:200px;width:250px">
                <div class="card-header">Today Total Sells</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{ count($data1)}}</h1>
                    </div>
                </div>
            </td>
     
            <td align="center" style="padding:30px;">
            <div class="card border-info text-white bg-info " style="height:200px;width:250px">
                <div class="card-header ">Last 7 Days Total Sells</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{ count($data2)}}</h1>
                    </div>
                </div>
            </td>

            <td align="center" style="padding:30px;">
            <div class="card border-danger text-white bg-danger  " style="height:200px;width:250px">
                <div class="card-header ">Most Sells item</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{ $data3[0]['product_name'] }}</h1>
                    </div>
                </div>
            </td>

            <td align="center" style="padding:30px;">
            <div class="card border-success text-white bg-success " style="height:200px;width:250px">
                <div class="card-header ">Total sales in current month</div>
                    <div class="card-body">
                        <h1 align="center" style="font-size:30px;">{{ $data4 }} BDT</h1>
                    </div>
                </div>
            </td>
           </tr>
            </table>
           
 @endsection