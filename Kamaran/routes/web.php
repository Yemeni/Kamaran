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

//Route::get('/', 'HomeController@index')->name('home');


// Temporally views for debugging
// Dashboard
Route::get('/overview', function (){
    return view('overview');
});

Route::get('/performance', function (){
    return view('performance');
});

Route::get('/inventory', function (){
    return view('inventory');
});

Route::get('/orders', function (){
    return view('orders');
});

Route::get('/shipments', function (){
    return view('shipments');
});

// Apps

Route::get('/review_orders', function (){
    return view('review_orders');
});

Route::get('/fill_order', function (){
    return view('fill_order');
});

Route::get('/track_shipments', function (){
    return view('track_shipments');
});

Route::get('/fill_shipment', function (){
    return view('fill_shipment');
});

Route::get('/manage_items', function (){
    return view('manage_items');
});

Route::get('/manage_suppliers', function (){
    return view('manage_suppliers');
});

Route::get('/print_reports', function (){
    return view('print_reports');
});

// Staff Management

Route::get('/profile', function (){
    return view('profile');
});

Route::get('/employees', function (){
    return view('employees');
});

Route::get('/my_manager', function (){
    return view('my_manager');
});