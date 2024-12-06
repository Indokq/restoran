<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;

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

Route::view('/', 'welcome');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');


    Route::controller(MenuController::class)->prefix('menu')->group(function () {
		Route::get('', 'index')->name('menu.index');
		Route::get('create', 'create')->name('menu.create');
		Route::post('store', 'store')->name('menu.store');
		Route::get('edit/{id}', 'edit')->name('menu.edit');
		Route::post('update', 'update')->name('menu.update');
		Route::get('delete/{id}', 'delete')->name('menu.delete');



	});

	Route::controller(CategoryController::class)->prefix('category')->group(function() {
		Route::get('', 'index')->name('category.index');
		Route::get('create', 'create')->name('category.create');
		Route::post('store', 'store')->name('category.store');
		Route::get('edit/{id}', 'edit')->name('category.edit');
		Route::get('delete/{id}', 'delete')->name('category.delete');
		Route::post('update', 'update')->name('category.update');
	});


});