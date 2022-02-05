<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Auth::routes();
// Auth Routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // Student Crud
    Route::get('/student/index', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');
});


//    Demo Pages
Route::get('/demo1', [PagesController::class, 'demo1'])->name('demo1');
Route::get('/demo2', [PagesController::class, 'demo2'])->name('demo2');
