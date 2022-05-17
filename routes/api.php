<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

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

// Route::get('/teste',function(){
//     // dd($request->headers->get('Authorization'));
//     $response = new \Illuminate\Http\Response(json_encode(['msg' => 'minha primeira resposta de API']));
//     $response->headers->set('Content-Type', 'application/json');
//     return $response;
// });


Route::namespace('Api')->prefix('products')->group(function(){
    Route::get('/',[ProductController::class,'index']);
    Route::get('/{id}',[ProductController::class,'show']);
    Route::post('/',[ProductController::class,'save']); //->middleware('auth.basic');
    Route::put('/',[ProductController::class,'update']);
    Route::delete('/{id}',[ProductController::class,'delete']);
});


// Route::namespace('Api')->group(function(){
//     // Products route
//     Route::prefix('products')->group(function(){
//         Route::get('/',[ProductController::class,'index']);
//         Route::get('/{id}',[ProductController::class,'show']);
//         Route::post('/',[ProductController::class,'save'])->middleware('auth.basic');
//         Route::put('/',[ProductController::class,'update']);
//         Route::delete('/{id}',[ProductController::class,'delete']);
//     });

//     Route::resource('users',[UserController::class]);
// });
