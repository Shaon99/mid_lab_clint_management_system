<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerController extends Controller
{
    public function cdashboard(){      
       
        return view('customer.customerdashboard');
    }
}
