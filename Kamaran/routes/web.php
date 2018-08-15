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

Route::get('/inventory_dashboard', function (){
    return view('inventory_dashboard');
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

Route::get('/track_shipments', 'ShipmentController@index');
Route::put('/shipment/{shipment}', 'ShipmentController@update');
Route::get('/shipment/{shipment}/{status}', 'ShipmentController@changeStatus');

Route::get('/item', 'ItemController@index');
Route::get('/item/create', 'ItemController@create');
Route::get('/item/{item}/edit', 'ItemController@edit');
Route::put('/item/{item}', 'ItemController@update');
Route::post('/item', 'ItemController@store');
Route::get('/item/{item}', 'ItemController@destroy');

Route::get('/supplier/{supplier}/items/{category?}', function(\App\Supplier $supplier, $category = null){
//	return $supplier->items;
	$items = '[';
	if ($category){
		foreach ($supplier->items()->where('category_id', $category)->get() as $key => $item){
			$items .= '{"id":"'.$item->id.'","text":"'.$item->name.'"}';
			if ($key < (count($supplier->items)-1)) $items .= ',';
		}
	}else{
		foreach ($supplier->items as $key => $item){
			$items .= '{"id":"'.$item->id.'","text":"'.$item->name.'"}';
			if ($key < (count($supplier->items)-1)) $items .= ',';
		}
	}
	$items .= ']';

	return $items;
});
Route::get('/supplier/create', 'SupplierController@create');
Route::post('/supplier', 'SupplierController@store');
Route::put('/supplier/{supplier}', 'SupplierController@update');
Route::get('/supplier/{supplier}', 'SupplierController@destroy');
Route::get('/supplier/{supplier}/edit', 'SupplierController@edit');
Route::get('/supplier', 'SupplierController@index');

Route::get('/inventory_transaction', function (){
    return view('inventory_transaction');
});

Route::get('/inventory', 'InventoryController@index');
Route::get('/inventory/{inventory}/approved', 'InventoryController@approved');

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