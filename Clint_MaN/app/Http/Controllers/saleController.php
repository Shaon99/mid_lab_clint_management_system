<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Attendence;
use App\Models\Ecom;
use App\Models\physicalStore;
use PDF;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class saleController extends Controller
{
    public function sdashboard(){      
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('sales.dashboard',$data);
    }


    public function ecommerce(){
        $u=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        $data = Ecom::whereDate('created_at', today())->count();
        $date = \Carbon\Carbon::today()->subDays(7);
        $data5 = Ecom::where('created_at', '>=', $date)->count();
        $data2 = Ecom::sum('total_price');
        $maxvaue = Ecom::max('total_price');
        $data3 = Ecom::where('total_price',$maxvaue)->get();


        return view('sales.manage',$u,compact('data','data5','data2','data3'));
    }

    public function physicalStore()
    {
        $u=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        $data1 = Physicalstore::whereDate('created_at', today())->get();
        $date = \Carbon\Carbon::today()->subDays(7);
        $data2 = Physicalstore::where('created_at', '>=', $date)->get();
        $maxvaue = Physicalstore::max('total_price');
        $data3 = Physicalstore::where('total_price',$maxvaue)->get();
        $data4 = Physicalstore::sum('total_price');
        return view('sales.physicalstoremanage',$u,compact('data1','data2','data3','data4'));
    }

    public function sales()
    {
        $u=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('sales.sellproduct',$u);
    }

    public function salesstore(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|max:30|min:3',
            'address' => 'required|max:50|min:3',
            'phone' => 'required|min:11|max:15',
            'product_id' => 'required',
            'product_name' => 'required',
            'unit_prics' => 'required|min:0',
            'quantity' => 'required|max:20|min:0',
            'total_price' => 'required|min:0',
            'payment_type' => 'required|max:5',
            'status' => 'required',
        ]);
        $data = new Physicalstore();

        $data->customer_name = $request->customer_name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->product_id = $request->product_id;
        $data->product_name = $request->product_name;
        $data->unit_prics = $request->unit_prics;
        $data->quantity = $request->quantity;
        $data->total_price = $request->total_price;
        $data->payment_type = $request->payment_type;
        $data->status = $request->status;
        $data->save();
         return back()->with('success','Payement Successfully Done');
    }
public function sold(){
    $u=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
    $physicalStore = Physicalstore::all();
    return view('sales.sold',$u)->with('store', $physicalStore);
}


public function download()
    {
        $data = Physicalstore::all();
        view()->share('Sales', $data);
        $pdf = PDF::loadView('sales.pdfreport', $data);
        return $pdf->download('All_sales_pdf_file.pdf');
    }
   
}
