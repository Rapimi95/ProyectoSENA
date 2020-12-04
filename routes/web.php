<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('proyectos', ProjectController::class);
    Route::resource('articulos', ArticleController::class);
    Route::resource('revistas', MagazineController::class);
    
    //Route::resource('file', FileController::class);
});

Route::get('/usuarios', function () {
    return view('users');
})->middleware('auth');

Route::get('/roles', function () {
    return view('roles');
})->middleware('auth');

Route::get('/resultados', function () {
    return view('resultados');
})->middleware('auth');

