<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
    public function index(){

        if(session()->has('LoggedUser')){
          session()->pull('LoggedUser');
            return redirect('/');
        }
        
    }
}
