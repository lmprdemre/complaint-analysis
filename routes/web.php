<?php

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

/*=======================================
=            LOGIN ENDPOINT             =
=======================================*/

Route::post('/login', 'LoginCtrl@loginWeb');
Route::get('/login', 'LoginCtrl@index')->name('login-index');
Route::get('/logout', 'LoginCtrl@logout');

/*=====  END OF LOGIN ENDPOINTS  ======*/

/*=======================================
=            ADMIN ENDPOINT             =
=======================================*/

Route::middleware(['CheckTokenWeb'])->group(function (){

    //Dashboard
    Route::get('/admin', function () { return redirect('/admin/analysis'); });
    Route::get('/admin/dashboard', function () { return redirect('/admin/analysis'); });

    //Analysis
    Route::get('/admin/analysis', 'Admin\AnalysisCtrl@index');

    //Categories
    Route::get('/admin/categories', 'Admin\CategoriesCtrl@index');
    Route::get('/admin/categories/edit/{id}', 'Admin\CategoriesCtrl@editIndex');

    //Products
    Route::get('/admin/products', 'Admin\ProductsCtrl@index');
    Route::get('/admin/products/edit/{id}', 'Admin\ProductsCtrl@editIndex');
    //Delete model from product.
    Route::get('/admin/products/model/delete/{id}', 'Admin\ProductsCtrl@deleteModel');

    //Branch
    Route::get('/admin/branches', 'Admin\BranchesCtrl@index');

    //Stats
    Route::get('/admin/stats', 'Admin\AnalysisCtrl@statSindex');

    //Profile
    Route::get('/admin/profile', 'Admin\ProfileCtrl@index');
    Route::post('/admin/profile', 'Admin\ProfileCtrl@save');
});

/*=====  END OF ADMIN ENDPOINTS  ======*/

/*=======================================
=            WEB ENDPOINT             =
=======================================*/
//Home
Route::get('/', function () {
    return view('welcome');
});

/*=====  END OF WEB ENDPOINTS  ======*/