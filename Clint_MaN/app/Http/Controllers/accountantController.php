<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountantController extends Controller
{
    public function accdashboard(){      
       
        return view('accountant.accountdashboard');
    }
    
}
