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
            'username' => 'required|unique:customers|max:25|min:4',
            'email' => 'required|unique:customers|email',
            'phone' => 'required|unique:customers|max:11|min:11',
            'password' => 'required|min:6',

            ]);
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->username = $request->username;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->password = Hash::make($request->password);
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

        $userInfo=Admin::where('username','=',$req->username)->where('type','=',"Admin")->first();

        if(!$userInfo){
            return back()->with('fail','Invalid Username');
        }
        
        else{
            if(Hash::check($req->password, $userInfo->password)){
                $req->session()->put('LoggedUser', $userInfo->id);
                return redirect('dashboard');

            }
            else{
                return back()->with('fail','Incorrect password');
            }
    }
}

}