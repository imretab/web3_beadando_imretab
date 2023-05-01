<?php
use App\Http\Controllers\RunController;
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
Route::get('/sign-up',[UserController::class,'Register']);
Route::post('/sign-up',[UserController::class,'SignIn']);
Route::get('/sign-out',[UserController::class,'LogOut']);
Route::get('/edit-profile',[UserController::class,'Profile'])->middleware('auth');
Route::post('/edit-profile',[UserController::class,'EditProfile'])->middleware('auth');
Route::get('/create-run',[RunController::class,'ShowCategory']);
Route::post('/create-run',[RunController::class,'UploadRun']);
Route::get('/manage-runs',[RunController::class,'ShowApproveRun']);
Route::get('manage-runs/{run}',[RunController::class,'ApproveRun']);
Route::get('/runs',[RunController::class,'ShowAllApprovedRuns']);