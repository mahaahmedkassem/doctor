<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('blog',[AppointmentController::class, 'blog'])->name('blog');

Route::get('dash',[AppointmentController::class, 'dash'])->name('dash');
Route::get('doctor',[AppointmentController::class, 'doctor'])->name('doctor');



/////////////////////////////////////////////////////////////
                      //contact///
  ///////////////////////////////////////////////////////////
    
  
            Route::get('/contactus',[ContactController ::class, 'index'])->name('contactus');
            Route::post('/sendemail',[ContactController ::class, 'send'])->name('sendemail');
         

      









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


Route::group(['prefix' => 'doctor', 'as' => '.doctor.'], function () {
  Route::get('/', [DoctorController::class, 'index'])->name('index');
  Route::get('/add', [DoctorController::class, 'create'])->name('create');
  Route::post('/store', [DoctorController::class, 'store'])->name('store');
  Route::get('/edit/{cat_id}', [DoctorController::class, 'edit'])->name('edit');
  Route::put('/update/{cat_id}', [DoctorController::class, 'update'])->name('update');
  Route::get('/delete/{cat_id}', [DoctorController::class,'destroy'])->name('delete');
 
});

Route::group(['prefix' => 'Appointment', 'as' => '.Appointment.'], function () {
  Route::get('/', [AppointmentController::class, 'index'])->name('index');
  Route::get('/add', [AppointmentController::class, 'create'])->name('create');
  Route::post('/store', [AppointmentController::class, 'store'])->name('store');
  Route::get('/edit/{cat_id}', [AppointmentController::class, 'edit'])->name('edit');
  Route::put('/update/{cat_id}', [AppointmentController::class, 'update'])->name('update');
  Route::get('/delete/{cat_id}', [AppointmentController::class,'destroy'])->name('delete');
 
});

Route::group(['prefix' => 'Department', 'as' => '.Department.'], function () {
  Route::get('/', [DepartmentController::class, 'index'])->name('index');
  Route::get('/add', [DepartmentController::class, 'create'])->name('create');
  Route::post('/store', [DepartmentController::class, 'store'])->name('store');
  Route::get('/edit/{cat_id}', [DepartmentController::class, 'edit'])->name('edit');
  Route::put('/update/{cat_id}', [DepartmentController::class, 'update'])->name('update');
  Route::get('/delete/{cat_id}', [DepartmentController::class,'destroy'])->name('delete');
 
});



});





