@extends('sales.dashboard')
@section('con')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                   <a class='btn btn-primary mt-1' href="/physicalstore">Physical Store</a>
            </div>
        </div>
    </div>
</div>
            <div class="card-header">
                <a href="{{ route('Sales.pdf') }}" class="btn btn-danger card-title float-right">
                <i class="fas fa-plus-circle nav-icon"></i>
                Export As PDF
                </a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-hover" >
                <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Payment Type </th>
                    <th>Status </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($store as $key => $data)
                        <tr>
                            <th>{{ $data->id }}</th>
                            <td>{{ $data->customer_name }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->product_id }}</td>
                            <td>{{ $data->product_name }}</td>
                            <td>{{ $data->unit_prics }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->total_price }}</td>
                            <td>{{ $data->payment_type }}</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
           
          </div>
        
        </div>
    
      </div>
     
    </div>
    
  </section>

@endsection
