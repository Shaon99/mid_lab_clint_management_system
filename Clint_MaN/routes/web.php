<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\accountantController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\saleController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[loginController::class,'index'])->name('login');
Route::get('/register',[loginController::class,'register'])->name('register');
Route::post('/register/save',[loginController::class,'save'])->name('register.save');
Route::post('/check',[loginController::class,'check'])->name('auth.check');

Route::group(['middleware'=>['check']], function(){
    Route::get('/dashboard',[adminController::class,'dashboard']);
//staff
    Route::get('/staff',[adminController::class,'staff'])->name('staff');
    Route::get('/addstaff',[adminController::class,'addstaff'])->name('addstaff');
    Route::post('/addstaff/save',[adminController::class,'savestaff'])->name('staff.save');
    Route::get('delete/staff/{id}',[adminController::Class,'deletestaff']);
    Route::get('edit/staff/{id}',[adminController::Class,'editstaff']);
    Route::post('update/staff/{id}',[adminController::Class,'updatestaff']);


//role
    Route::get('/role',[adminController::class,'role'])->name('role');
    Route::get('/addrole',[adminController::class,'addrole'])->name('addrole');
    Route::post('/role/save',[adminController::class,'rolesave'])->name('role.save');
    Route::get('delete/role/{id}',[adminController::Class,'delete']);
    Route::get('edit/role/{id}',[adminController::Class,'edit']);
    Route::post('update/role/{id}',[adminController::Class,'update']);

    Route::get('/attendence',[adminController::class,'attendence']);
    Route::post('/take/attendence',[adminController::class,'takeattendence'])->name('take.attendence');
    Route::get('/all/attendence',[adminController::class,'allattendence'])->name('all.attendence');
    Route::get('/edit/attendence/{edit_date}',[adminController::Class,'editatt']);
    Route::post('/update/attendence/',[adminController::Class,'updateatt']);
    Route::get('/delete/attendence/{edit_date}',[adminController::Class,'deleteatt']);
//cus
Route::get('/customer',[adminController::class,'customer']);
}); 

Route::group(['middleware'=>['check']], function(){
    Route::get('/vdashboard',[vendorController::class,'dashboard']);

});  

Route::group(['middleware'=>['check']], function(){
    Route::get('/adashboard',[accountantController::class,'accdashboard']);

});  
Route::group(['middleware'=>['check']], function(){
    Route::get('/cdashboard',[customerController::class,'cdashboard']);

});  

Route::group(['middleware'=>['check']], function(){
    Route::get('/saledashboard',[saleController::class,'sdashboard']);
    Route::get('/ecommerce', [saleController::class,'ecommerce'])->name('SalesController.ecommerce');
    Route::get('/physicalstore', [saleController::class,'physicalStore'])->name('SalesController.ecommerce');
    Route::get('physicalstore/productsales', [SaleController::class,'sales'])->name('SalesController.sales');
    Route::post('physicalstore/productsales', [SaleController::class,'salesstore'])->name('SalesController.sales');

    Route::get('physicalstore/sold', [SaleController::class, 'sold']);
    Route::get('/physicalstore/pdfdownload', [SaleController::class, 'download'])->name('Sales.pdf');






}); 


//logout
Route::get('/logout',[logoutController::class,'index']);;
