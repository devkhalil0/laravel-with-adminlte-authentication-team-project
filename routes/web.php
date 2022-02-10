<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyHelperController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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
    Route::resource('students', StudentController::class);
    Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
    Route::get('/students/email/verify/{student}', [StudentController::class, 'emailVerify'])->name('students.emailVerify');
    Route::get('/students/email/verify/link/{student}', [StudentController::class, 'sendLink'])->name('students.sendLink');
    Route::get('/students/verify/email/{token}', [StudentController::class, 'verifyEmailWithToken'])->name('students.verify.email.token');
});

Route::get('/myhelper',[MyHelperController::class, 'checkMyHelper']);

//    Demo Pages
Route::get('/demo1', [PagesController::class, 'demo1'])->name('demo1');
Route::get('/demo2', [PagesController::class, 'demo2'])->name('demo2');
