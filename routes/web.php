<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
})->name('home');

Route::get('/about', [AboutController::class,'index'])->name('about');

Route::get('/admin', [AdminController::class,'index'])->name('admin')->middleware('check');
Route::get('/member', [MemberController::class,'index'])->name('member');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = DB::table('users')->get();
        return view('dashboard',compact('users'));
    })->name('dashboard');
});

Route::get('/department/all',[DepartmentController::class,'index'])->name('department');