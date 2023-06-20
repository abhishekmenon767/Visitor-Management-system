<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AdminController;


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


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/Addvisitors',[MainController::class,'show']);
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');
Route::get('/visitor', [VisitorController::class, 'index'])->name('visitor.index');
Route::post('/visitor', [VisitorController::class, 'store'])->name('visitor.store');
Route::get('/allvisitors', [VisitorController::class, 'view'])->name('allvisitors');

Route::post('/visitor/{id}/checkout', [VisitorController::class, 'checkout'])->name('visitor.checkout');
Route::get('/visitor/search', [VisitorController::class,'search'])->name('visitor.search');
Route::get('admin/visitors/build', [VisitorController::class, 'build'])->middleware('build');


Route::get('/admin', [AdminController::class,'index'])->name('admin');
;

