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


/*
 * layouts plan
/login
/dashboard
    - admin view
    - manager view
    - staff view
    - inventory employee view
/categories
    - admin view
/items
    - manager + staff view
/suppliers
    - manager view
    - staff view
/staff
    - manager view
/orders
    - manager view
    - staff view
/shipments
    - manager+staff view
/inventory
    - manager+staff view
    - inventory employee view

 */
//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/something', function () {
//    return view('something');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route::get('/dashboard', function (){
//    return view('dashboard');
//});