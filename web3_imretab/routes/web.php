<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('navbar');
});
Route::get('/sign-in',[UserController::class,'Login']);
Route::post('/sign-in',[UserController::class,'SignIn']);
Route::get('/sign-out',[UserController::class,'LogOut']);
Route::get('/edit_profile',[UserController::class,'Profile'])->middleware('auth');
Route::post('/edit_profile',[UserController::class,'EditProfile'])->middleware('auth');