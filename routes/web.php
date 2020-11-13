<?php

use App\Models\Order;
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

Route::get('/', function () {

//    $orders = Order::with('owner','lastActiveStatusChange.status')->get();

    $orders = Order::select('users.name as owner_name','users.id as owner_id','orders.id as order_id')
        ->join('users','users.id','=','user_id')
        ->withCurrentStatus()
        ->get();

    return view('welcome', compact('orders'));
});
