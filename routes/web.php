<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\downloadController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\projectsController;
use App\Http\Controllers\resumeController;
use App\Http\Controllers\resume_infoController;
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


//user interface
//main interface for user
Route::get('/',[resumeController::class,'resume'])->name('resume');
Route::get('/download', [downloadController::class, 'download'])->name('download');
Route::get('/resume', [resumeController::class, 'resume_info']);


//login routes
Route::post('/Login',[loginController::class,'login_store'])->name('login_store');
Route::get('/login',[loginController::class,'login'])->name('login');
Route::get('/register',[loginController::class,'register'])->name('register');
Route::post('/register_store',[loginController::class,'register_store'])->name('register_store');
Route::get('logout',[loginController::class,'logout'])->name('logout');




//dashboard route's

Route::get('/dashboard',[dashboardController::class,'dashboard']);
Route::put('/dashboard_show/{id}', [dashboardController::class, 'update']);
Route::post('/deleteProject/{id}', [dashboardController::class,'deleteProject']);
Route::post('/add/project',[projectsController::class,'project_store']);



//forgotPASSWORD
Route::get('/forgotPassword',[loginController::class, 'ForgotPassword'])->name('ForgotPassword');
Route::post('/forgotPassword',[loginController::class,'sentForgotPassword'])->name('sentForgotPassword');
Route::get('/forgotPassword/{token}',[loginController::class,'storeNewPassword'])->name('storeNewPassword');

Route::post('/SuccessfulUpdated',[loginController::class,'updatePassword'])->name('updatePassword');


Route::get('/serverIsOffline',[resumeController::class,'serverIsOffline']);

