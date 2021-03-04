<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\logoutController;


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
});    


//logout
Route::get('/logout',[logoutController::class,'index']);;
