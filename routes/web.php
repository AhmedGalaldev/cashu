<?php

use App\Http\Controllers\ConfigsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SalesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Admin Routes
Route::group([
    'prefix' => 'admin',
    'middleware'=>['auth','role:Admin']
], function () {
    Route::get('/sales',[SalesController::class,'index'])->name('adminsales.index');
    Route::get('/configs',[ConfigsController::class,'index'])->name('adminconfigs.index');
    Route::get('/configs/{config}/edit',[ConfigsController::class,'edit'])->name('adminconfigs.edit');
    Route::put('/configs/{config}',[ConfigsController::class,'update'])->name('adminconfigs.update');

    
});

// Sales Routes
Route::group([
    'prefix' => 'sales',
    'middleware'=>['auth','role:Sales']
], function () {
    Route::get('/sales',[SalesController::class,'index'])->name('sales.index');
    
});

// Back Office Routes
Route::group([
    'prefix' => 'back-office',
    'middleware'=>['auth','role:Back Office']
], function () {
    Route::get('/configs',[ConfigsController::class,'index'])->name('configs.index'); 
    Route::get('/configs/{config}/edit',[ConfigsController::class,'edit'])->name('configs.edit');
    Route::put('/configs/{config}',[ConfigsController::class,'update'])->name('configs.update');
});


Route::post('/assign-role',[RolesController::class,'assignRole'])->name('assignRole');