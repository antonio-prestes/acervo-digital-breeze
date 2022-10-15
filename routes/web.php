<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ItensController;

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
    return view('home');})->name('home');
Route::get('/about', function () {
    return view('about');})->name('about');
Route::get('/login', function () {
    return view('login');})->name('login');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'create'])->name('contact.create');

Route::controller(DashboardController::class)->middleware(['auth'])->group(function (){
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(ItensController::class)->middleware(['auth'])->group(function (){
    Route::get('/collection', 'index')->name('collection');
    Route::get('/collection/create', 'create')->name('collection.create');
    Route::post('/collection/create', 'store')->name('collection.store');
    Route::get('/collection/delete/{id}', 'delete')->name('collection.delete');
});

Route::get('/users', function () {
    return view('users');
})->middleware(['auth'])->name('users');

require __DIR__.'/auth.php';
