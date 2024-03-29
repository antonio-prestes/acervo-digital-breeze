<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\UsersController;
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
    return view('home');})->name('home');
Route::get('/about', function () {
    return view('about');})->name('about');
Route::get('/login', function () {
    return view('login');})->name('login');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'create'])->name('contact.create');

Route::controller(DashboardController::class)->middleware(['auth', 'verified'])->group(function (){
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(ItensController::class)->middleware(['auth', 'verified'])->group(function (){
    Route::get('/collection', 'index')->name('collection');
    Route::get('/collection/create', 'create')->name('collection.create');
    Route::post('/collection/create', 'store')->name('collection.store');
    Route::get('/collection/delete/{id}', 'delete')->name('collection.delete');
    Route::get('/collection/edit/{id}', 'edit')->name('collection.edit');
    Route::put('/collection/update/{id}', 'update')->name('collection.update');
    Route::get('/collection/export', 'export')->name('collection.export');
});

Route::controller(UsersController::class)->middleware(['auth', 'verified', 'isAdmin'])->group(function (){
    Route::get('/users', 'index')->name('users');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users/create', 'store')->name('users.store');
    Route::get('/users/delete/{id}', 'destroy')->name('users.delete');
});

Route::controller(UsersController::class)->middleware(['auth', 'verified'])->group(function (){
    Route::get('/users/edit/{id}', 'edit')->name('users.edit');
    Route::put('/users/update/{id}', 'update')->name('users.update');
});

Route::controller(CollectionController::class)->group(function (){
    Route::get('collection/{user?}', 'index')->name('collection.index');
    Route::get('collection-item/{item}', 'item')->name('collection.item');
    Route::get('collection/{user}/category/{category}', 'category')->name('collection.category');
});

require __DIR__.'/auth.php';
