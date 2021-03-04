<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{        

    public function dashboard(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $user=DB::table('users')->count();
        return view('admin.admindashboard',$data,compact('user'));
    }

    //staff
    public function staff(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $all=DB::table('users')->get();
        return view('admin.staff',$data,compact('all'));
    }

    public function addstaff(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $type=DB::table('type')->get();
        return view('admin.addstaff',$data,compact('type'));
    }

    //addstaff
    public function savestaff(Request $request){
         $validated = $request->validate([
            
        'name' => 'required|max:25|min:4',
        'username' => 'required|unique:users|max:25|min:4',
        'email' => 'required|unique:users|email',
        'phone' => 'required|unique:users|max:11|min:11',
        'password' => 'required|min:6',
        'type'=>'required',

        ]);
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->type = $request->type;

        $save = $admin->save();

        if($save){
           return back()->with('success','New User has been successfuly added');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
}
//deletestaff
            public function deletestaff($id){
                $role=DB::table('users')->where ('id',$id)->delete();
                if($role){
                    return back()->with('success','User has been successfuly Deleted');

                }
            }


            public function editstaff($id){
                $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
                $type=DB::table('type')->get();
                $all=DB::table('users')->where('id',$id)->first();
                return view('admin.editstaff',$data,compact('type','all'));
               }
            //edit

               public function updatestaff(Request $request,$id){
                $validated = $request->validate([
                   
               'name' => 'required|max:25|min:4',
               'username' => 'required|max:25|min:4',
               'email' => 'required|email',
               'phone' => 'required|max:11|min:11',
               'type'=>'required',
       
               ]);
               $admin = new Admin;
               $admin->name = $request->name;
               $admin->username = $request->username;
               $admin->email = $request->email;
               $admin->phone = $request->phone;
               $admin->type = $request->type;
       
               $save = $admin::find($id);
               $save->update($request->all());

               if($save){
                  return back()->with('success','New User has been successfuly Updated');
               }else{
                   return back()->with('fail','Something went wrong, try again later');
               }
       }



    //role
    public function role(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        $all=DB::table('type')->get();
        return view('admin.role',$data,compact('all'));
    }

    public function addrole(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('admin.addrole',$data);
    }

    public function edit($id){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $role=DB::table('type')->where ('id',$id)->first();
        return view('admin.editrole',$data,compact('role'));
       }
    

       public function update(Request $req,$id){
        $validated = $req->validate([
            'name' => 'required|max:25|min:4',
        ]);
    
       $data=array();
       $data['role_name']=$req->name;
       $role=DB::table('type')->where('id',$id)->update($data);
       if($role){
        return back()->with('success','Role has been successfuly updated');

       }else{
        $role=DB::table('type')->where('id',$id)->update($data);

        return back()->with('success','Role has been successfuly updated');

       }
    }

    public function delete($id){
        $role=DB::table('type')->where ('id',$id)->delete();
        if($role){
            return back()->with('success','Role has been successfuly Deleted');
    
           }
    }

    

    public function rolesave(Request $req){
        $validated = $req->validate([
            
            'name' => 'required|max:25|min:4',
            
    
            ]);
            $data['role_name']=$req->name;
            $save=DB::table('type')->insert($data);
            if($save){
               return back()->with('success','New Role has been successfuly added');

            }
            
            else{
                return back()->with('fail','Something went wrong, try again later');
            }
        }


        
}
