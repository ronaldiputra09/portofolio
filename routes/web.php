<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Auth\Login;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', Login::class)->name('admin.login')->middleware('guest');

// create group route with middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/category', \App\Http\Livewire\Admin\Category\Index::class)->name('admin.category');
    Route::get('/tool', \App\Http\Livewire\Admin\Tool\Index::class)->name('admin.tool');
    Route::get('/sosial', \App\Http\Livewire\Admin\Sosial\Index::class)->name('admin.sosial');
});
