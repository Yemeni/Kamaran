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


// Temporally views for debugging
// Dashboard
Route::get('/', 'HomeController@index');

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

Route::get('/about', function (){
    return view('about');
});

// Apps

Route::get('/category/create', 'CategoryController@create');
Route::post('/category', 'CategoryController@store');
Route::get('/category', 'CategoryController@index');
Route::get('/category/{category}/edit', 'CategoryController@edit');
Route::put('/category/{category}', 'CategoryController@update');
Route::delete('/category/{category}', 'CategoryController@destroy');

Route::get('/review_orders', 'OrderController@index');
Route::get('/order/{order}/approve', 'OrderController@approve');
Route::get('/order/{order}/cancel', 'OrderController@cancel');
Route::post('/order', 'OrderController@store');
Route::put('/order/{order}', 'OrderController@update');
Route::get('/order/{order}/edit', 'OrderController@edit');
Route::get('/order/{order}/delete', 'OrderController@destroy');
Route::get('/fill_order', 'OrderController@create');

Route::get('/track_shipments', function (){
    return view('track_shipments');
});

Route::get('/fill_shipment', function (){
    return view('fill_shipment');
});

Route::get('/manage_items', function (){
    return view('manage_items');
});

Route::get('/item', function (){
    return view('item');
});

Route::get('/supplier/{supplier}/items', function(\App\Supplier $supplier){
//	return $supplier->items;
	$items = '[';
	foreach ($supplier->items as $key => $item){
		$items .= '{"id":"'.$item->id.'","text":"'.$item->name.'"}';
		if ($key < (count($supplier->items)-1)) $items .= ',';
	}
	$items .= ']';

	return $items;
});
Route::get('/supplier', function (){
    return view('supplier');
});

Route::get('/manage_suppliers', function (){
    return view('manage_suppliers');
});

Route::get('/make_transaction', function (){
    return view('make_transaction');
});

Route::get('/transactions', function (){
    return view('transactions');
});

Route::get('/print_reports', function (){
    return view('print_reports');
});

// Staff Management

Route::get('/profile/{user?}', 'UserController@profile');
Route::post('/profile/edit/{user?}', 'UserController@profileEdit');
Route::post('/profile/changePassword/{user?}', 'UserController@profileChangePassword');

Route::get('/manage_employees', 'UserController@employees');

Route::get('/employee', 'UserController@create');
Route::post('/employee', 'UserController@store');

Route::get('/employee/{user}/edit', 'UserController@edit');
Route::post('/employee/{user}/edit', 'UserController@update');

Route::delete('/employee/{user}', 'UserController@destroy');

Route::get('/my_manager', 'UserController@myManager');