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
    Route::resource('articulos-resultantes', ResultingArticleController::class);
    Route::resource('articulos-fuente', SourceArticleController::class);
    Route::resource('revistas', MagazineController::class);
    Route::resource('relatedfile', FileController::class);
    
    Route::post('/proyectos/relacionar/articulo-fuente', 'ProjectController@attachSourceArticle');
    Route::post('/proyectos/relacionar/articulo-resultante', 'ProjectController@attachResultingArticle');

    Route::get('/ajax/proyectos/{query}', 'ProjectController@search');
    Route::get('/ajax/find/proyectos/{query}', 'ProjectController@find');
    
    Route::get('/ajax/articulos-fuente/{query}', 'SourceArticleController@search');
    Route::get('/ajax/find/articulos-fuente/{query}', 'SourceArticleController@find');

    Route::get('/ajax/articulos-resultantes/{query}', 'ResultingArticleController@search');
    Route::get('/ajax/find/articulos-resultantes/{query}', 'ResultingArticleController@find');
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

