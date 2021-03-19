<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use DB;

use Illuminate\Support\Facades\Hash;
class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function register(){
        return view('login.register');
    }

    public function save(Request $request){
        $validated = $request->validate([
            
            'name' => 'required|max:25|min:4',
            'username' => 'required|unique:users|max:25|min:4',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users|max:11|min:11',
            'password' => 'required|min:6',

            ]);
            $customer = new Admin;
            $customer->name = $request->name;
            $customer->username = $request->username;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->password = Hash::make($request->password);
            $customer->type = "Customer";
            $save = $customer->save();
   
            if($save){
               return back()->with('success','New User has been successfuly added please Sign In now');
            }else{
                return back()->with('fail','Something went wrong, try again later');
            }
        }

    public function check(Request $req){
        $validated = $req->validate([
        'username' => 'required|max:25|min:4',
        'password' => 'required|string|min:8|max:20',
    
        ]);

        $userInfo=Admin::where('username','=',$req->username)->first();

        if(!$userInfo){
            return back()->with('fail','Invalid Username');
        }
        
        else{
            if(Hash::check($req->password, $userInfo->password) &&  $userInfo->type=="Admin"){
                $req->session()->put('LoggedUser', $userInfo->id);
                return redirect('dashboard');

            }
            if(Hash::check($req->password, $userInfo->password) &&  $userInfo->type=="Vendor"){
                $req->session()->put('LoggedUser', $userInfo->id);
                return redirect('vdashboard');

            }
            if(Hash::check($req->password, $userInfo->password) &&  $userInfo->type=="Accountant"){
                $req->session()->put('LoggedUser', $userInfo->id);
                return redirect('adashboard');

            }
            if(Hash::check($req->password, $userInfo->password) &&  $userInfo->type=="Sales"){
                $req->session()->put('LoggedUser', $userInfo->id);
                return redirect('saledashboard');

            }
            if(Hash::check($req->password, $userInfo->password) &&  $userInfo->type=="Customer"){
                $req->session()->put('LoggedUser', $userInfo->id);
                return redirect('cdashboard');

            }
            else{
                return back()->with('fail','Incorrect password');
            } 
    }
}

}