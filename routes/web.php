<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('blog',[AppointmentController::class, 'blog'])->name('blog');

Route::get('dash',[AppointmentController::class, 'dash'])->name('dash');




Route::group(['middleware' => ['auth', 'verified'],'prefix' => 'dashboard', "as" => "dashboard"], function () {
   
    
Route::group(['prefix' => 'user', 'as' => '.user.'], function () {
  Route::get('/', [UserController::class, 'index'])->name('index');
  Route::get('/adduser', [UserController::class, 'create'])->name('create');
  Route::post('/store', [UserController::class, 'store'])->name('store');
  Route::get('/edit/{u_id}', [UserController::class, 'edit'])->name('edit');
  Route::put('/update/{u_id}', [UserController::class, 'update'])->name('update');
  Route::get('/delete/{u_id}', [UserController::class,'destroy'])->name('delete');
///url be dashbord/user/adduser
});

Route::group(['prefix' => 'trasheduser', 'as' => '.trasheduser.'], function () {
    Route::get('/', [UserController::class, 'trashed'])->name('trashed');
  
  Route::get('/fduser/{car_id}', [UserController::class, 'forcedelete'])->name('fduser');
  Route::get('reuser1/{id}',[UserController::class, 'restore'])->name('reuser');
//url be dashbord/trasheduser
//in trashedlist href="trasheduser/fduser/{{$test->id}}" 
//href="trasheduser/reuser/{{$test->id}}"  we use the url
});
});





