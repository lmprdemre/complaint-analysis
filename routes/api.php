<?php

use Illuminate\Http\Request;

//Login
Route::post('/login', 'LoginCtrl@login');

//User Endpoints
Route::middleware(['AllowedUserTypes:admin,user'])->group(function (){
    Route::post('/user', 'UserCtrl@create');
    Route::get('/user/{id}', 'UserCtrl@read');
});


Route::middleware(['AllowedUserTypes:admin'])->group(function (){
    //Analysis
    Route::post('/analysis', 'AnalysisCtrl@doAnalysis');
    Route::post('/analysis/create-statistics', 'AnalysisCtrl@doStatistics');

    //Categories Endpoints
    Route::post('/categories', 'CategoriesCtrl@create');
    Route::get('/categories', 'CategoriesCtrl@readAll');
    Route::put('/categories/edit/{id}', 'CategoriesCtrl@update');

    //Product Endpoints

    Route::post('/products', 'ProductCtrl@create');
    Route::get('/products', 'ProductCtrl@readAll');
    Route::put('/products/edit/{id}', 'ProductCtrl@update');


    //Product's Models
    Route::post('/products/models', 'ProductModelCtrl@create');

    //Branches Endpoints
    Route::post('/branches', 'BranchesCtrl@create');
    Route::get('/branches', 'BranchesCtrl@readAll');
});


