<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Attendence;

use DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{        

    public function dashboard(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $user=DB::table('users')->where('type',"!=",'Customer')->count();
    
        $cus=DB::table('users')->where('type',"=",'Customer')->count();
        $sell=DB::table('physical-store')->sum('total_price');
        $ec=DB::table('e_com')->sum('total_price');
        $Total=$sell+$ec;
        




        return view('admin.admindashboard',$data,compact('user','cus','sell','ec','Total'));
    }

    //staff
    public function staff(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $all=DB::table('users')->where('type',"!=",'Customer')->get();
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

public function attendence(){
    $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
    $all=DB::table('users')->where('type',"!=",'Customer')->get();
    return view('admin.attendence',$data,compact('all'));
}


public function takeattendence(Request $req){

    $date=$req->att_date;
    $att_date=DB::table('attendence')->where('att_date',$date)->first();
    if($att_date){
        return back()->with('success1','Attendance Already Taken For Today');
    }else{
    foreach($req->user_id as $id){
        $data[]=[
      "user_id"=>$id,
      "attendence"=>$req->attendence[$id],
      "att_date"=>$req->att_date,
      "att_year"=>$req->att_year,
      "month"=>$req->att_month,

      "edit_date"=>date("d-m-y"),
    ];
    }
    $att=DB::table('attendence')->insert($data);
    if($att){
     return back()->with('success','Attendence has been successfuly Taken');

    }else{
     return back()->with('fail','Something went wrong, try again later');

    }
}
}

public function allattendence(){
    $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
    $att=DB::table('attendence')->select('edit_date')->groupBy('edit_date')->get();
    return view('admin.allattendence',$data,compact('att'));
}

public function editatt($edit_date){  
    $date=DB::table('attendence')->where('edit_date', $edit_date)->first();

    $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
    $att=DB::table('attendence')->join('users','attendence.user_id','users.id')->select('users.name','users.type','attendence.*')->where('edit_date',$edit_date)->get();

    return view('admin.editatt',$data,compact('att','date'));

}
        
public function updateatt(Request $req){
    foreach($req->id as $id){
        $data=[
      "attendence"=>$req->attendence[$id],
    
    ];
      $atten=Attendence::where(['att_date'=>$req->att_date, 'id'=>$id])->first();
      $atten->update($data);
      if( $atten){
        return back()->with('success','Attendence has been successfuly Updated');
   
       }else{
        return back()->with('fail','Something went wrong, try again later');
   
       }
}
}
public function deleteatt($edit_date){
    $data=DB::table('attendence')->where ('edit_date',$edit_date)->delete();
    if($data){
        return back()->with('success','Attendence has been successfuly Deleted');

       }
}

//customer
public function customer(){
    $data=['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
    $cus=DB::table('users')->where('type',"=",'Customer')->get();
    return view('admin.customers',$data,compact('cus'));
}

}
