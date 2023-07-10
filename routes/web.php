<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
// use Illuminate\Http\Request;
// Route::get('/token', function(Request $request){
//     $token=$request->session()->token();
//     $token= csrf_token();
// });

Route::get('/', [StudentController::class,'index'] )->name('index');
Route::post('/', [StudentController::class,'create'] )->name('create');
Route::get('/edit/{id}', [StudentController::class,'edit'] )->name('edit');
Route::post('/edit/{id}', [StudentController::class,'update'] )->name('update');
Route::get('/delete/{id}', [StudentController::class,'destroy'] )->name('destroy');
Route::post('/post', [PostController::class, 'store']);


