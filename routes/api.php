<?php

use App\Http\Controllers\oamrloginController;
use App\Http\Controllers\smarthouseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersinfoController;
use App\Models\smarthouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[UserController::class,'loginUser']);
// Route::post('register',[UserController::class,'register']);
Route::POST('storeuser',[UsersinfoController::class,'store']);
Route::GET('list',[UsersinfoController::class,'list']);
Route::GET('show/{email}',[UsersinfoController::class,'show']);
Route::PUT('update/{id}',[UsersinfoController::class,'update']);
Route::GET('showthehous/{email}',[smarthouseController::class,'showthehous']);
Route::GET('showifemailexist',[smarthouseController::class,'showifemailexist']);
Route::POST('storehouseinfo',[smarthouseController::class,'storehouseinfo']);
Route::POST('updatehouse/{email}',[smarthouseController::class,'updatehouse']);
Route::POST('registeromar',[oamrloginController::class,'registeromar']);
Route::post('oamrloginn',[oamrloginController::class,'oamrloginn']);
//"guzzlehttp/guzzle": "^7.2", "google/apiclient": "2.0.0" inside composet.json