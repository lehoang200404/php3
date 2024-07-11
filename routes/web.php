<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProController;

// method http
// +GET, POST, PUT, PATCH ,DELETE
// Base url: http://127.0.0.1:8000/

// http://127.0.0.1:8000/test
Route::get('/test', function(){
    echo 'hello';
});

Route::get('/', function(){
    echo 'trang chu';
});

 // list-product
 Route::get('list-product', [ProductController::class, 'showProduct']);

 

 Route::get('information', [SinhVienController::class, 'showInformation']);
 // Slug
 //http://127.0.0.1:8000/get-product/1
 Route::get('get-product/{id}', [ProductController::class, 'getProduct']);

 //Params
  //http://127.0.0.1:8000/update-product?id=1&name=hoang
 Route::get('update-product', [ProductController::class, 'updateProduct']);

 Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
    Route::get('list-users', [UserController::class, 'listUsers'])
    ->name('listUsers');

    Route::get('add-users', [UserController::class, 'addUsers'])
    ->name('addUsers');

    Route::post('add-users', [UserController::class, 'addPostUsers'])
    ->name('addPostUsers');

    Route::get('update-user/{userId}', [UserController::class, 'updateUser'])
    ->name('updateUser');

    Route::post('update-user', [UserController::class, 'updatePostUser'])
    ->name('updatePostUser');

    Route::get('delete-users/{userId}', [UserController::class, 'deleteUser'])
    ->name('deleteUser');
});

//LAB2
Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
    Route::get('list-products', [ProController::class, 'listProducts'])
    ->name('listProducts');

    Route::get('add-products', [ProController::class, 'addProducts'])
    ->name('addProducts');

    Route::post('add-products', [ProController::class, 'addPostProducts'])
    ->name('addPostProducts');

    Route::get('update-products/{productsId}', [ProController::class, 'updateProducts'])
    ->name('updateProducts');

    Route::post('update-products', [ProController::class, 'updatePostProducts'])
    ->name('updatePostProducts');

    Route::get('delete-products/{productsId}', [ProController::class, 'deleteProducts'])
    ->name('deleteProducts');

    // Route::get('search-products', [ProController::class, 'searchProducts'])
    // ->name('products.searchProducts');

});