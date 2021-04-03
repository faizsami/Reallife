<?php

use Illuminate\Support\Facades\Route;

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


//Registration Routes

Route::get('/unauthorized', function () {
   return view('errors.not-authorized');
});

/**************************** Main Site Routes ************************* */
Route::get('/', function (){
    return view('/auth/login');
});







//Admin Dashboard Routes
Route::middleware(['auth:sanctum', 'verified',])->group(function() {   
    Route::get('/admin/registration', 'UserController@registration');
});

//User Dashboard Routes 
Route::middleware(['auth:sanctum', 'verified', 'block', 'user'])->group(function() {
    

    //Change Theme
    Route::get('/user/change-theme-dark', 'MainController@changetheme');

    //User Registration inside
   
    
});



//All Ajax ROUTES
Route::get('/get-user-by-id', 'AjaxController@Get_User_By_Id');
Route::get('/get-sub-cat-by-cat-id', 'AjaxController@Get_Sub_Cat_By_Cat_Id');
Route::get('/get-user-details', 'AjaxController@GetUserDetails');
Route::get('/get-product-list', 'AjaxController@GetProductsList');
Route::get('/get-items-by-order-id-f', 'AjaxController@getItemsByOrderIdF');
Route::get('/get-items-by-order-id', 'AjaxController@getItemsByOrderId');
Route::get('/get-items-by-order-id-invoice', 'AjaxController@getItemsByOrderIdInvoice');
Route::get('/read-notification', 'AjaxController@readNotifications');
Route::get('/read-allnotification', 'AjaxController@readAllNotifications');
Route::get('/get-user-details-for-invoice', 'AjaxController@fetchUserDetailsForInvoice');
Route::get('/get-product-detail-by-id', 'AjaxController@getProductDetailsById');
Route::get('/test', 'UserController@test');