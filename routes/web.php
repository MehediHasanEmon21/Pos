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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'],function(){

	Route::prefix('/user')->group(function(){

		Route::get('/list','Admin\UserController@all_user')->name('user.view');
		Route::get('/create','Admin\UserController@create')->name('user.create');
		Route::post('/store','Admin\UserController@store')->name('user.store');
		Route::get('/delete/{id}','Admin\UserController@delete')->name('user.destroy');

	});

	Route::prefix('/profile')->group(function(){

		Route::get('/view','Admin\ProfileController@view')->name('profile.view');
		Route::get('/edit/{id}','Admin\ProfileController@edit')->name('profile.edit');
		Route::post('/update/{id}','Admin\ProfileController@update')->name('profile.update');


	});

	//supplier route
	Route::prefix('/supplier')->group(function(){

		Route::get('/list','Admin\SupplierController@all_supplier')->name('supplier.view');
		Route::get('/create','Admin\SupplierController@create')->name('supplier.create');
		Route::post('/store','Admin\SupplierController@store')->name('supplier.store');


	});

	//customer route
	Route::prefix('/customer')->group(function(){

		Route::get('/list','Admin\CustomerController@all_customer')->name('customer.view');
		Route::get('/create','Admin\CustomerController@create')->name('customer.create');
		Route::post('/store','Admin\CustomerController@store')->name('customer.store');


	});

	//unit route
	Route::prefix('/unit')->group(function(){

		Route::get('/list','Admin\UnitController@all_unit')->name('unit.view');
		Route::get('/create','Admin\UnitController@create')->name('unit.create');
		Route::post('/store','Admin\UnitController@store')->name('unit.store');


	});

	//category route
	Route::prefix('/category')->group(function(){

		Route::get('/list','Admin\CategoryController@all_category')->name('category.view');
		Route::get('/create','Admin\CategoryController@create')->name('category.create');
		Route::post('/store','Admin\CategoryController@store')->name('category.store');


	});

	//product route
	Route::prefix('/product')->group(function(){

		Route::get('/list','Admin\ProductController@all_product')->name('product.view');
		Route::get('/create','Admin\ProductController@create')->name('product.create');
		Route::post('/store','Admin\ProductController@store')->name('product.store');


	});

	//product route
	Route::prefix('/purchase')->group(function(){

		Route::get('/list','Admin\PurchaseController@all_purchase')->name('purchase.view');
		Route::get('/approve/list','Admin\PurchaseController@approve_purchase')->name('approve.purchase');
		Route::get('/create','Admin\PurchaseController@create')->name('purchase.create');
		Route::get('/approve/{id}','Admin\PurchaseController@approve')->name('purchase.approve');
		Route::post('/store','Admin\PurchaseController@store')->name('purchase.store');


	});

	//ajax route
	Route::get('/getCategory','Admin\DefaultController@getCategory')->name('get-category');
	Route::get('/getProduct','Admin\DefaultController@getProduct')->name('get-product');
	Route::get('/getStock','Admin\DefaultController@getStock')->name('get-stock');


	//product route
	Route::prefix('/invoice')->group(function(){

		Route::get('/list','Admin\InvoiceController@all_invoice')->name('invoice.view');
		Route::get('/create','Admin\InvoiceController@create')->name('invoice.create');
		Route::post('/store','Admin\InvoiceController@store')->name('invoice.store');
		Route::get('/pending/list','Admin\InvoiceController@pending_invoice')->name('pending.invoice');
		Route::get('/invoice/delete/{id}','Admin\InvoiceController@delete_invoice')->name('invoice.delete');
		Route::get('/approve/{id}','Admin\InvoiceController@approve_detail')->name('invoice.approve');
		Route::post('/approve/done/{id}','Admin\InvoiceController@approve')->name('invoice.approve.done');
		Route::get('/print/list','Admin\InvoiceController@print_invoice_list')->name('invoice.print.list');
		Route::get('/print/{id}','Admin\InvoiceController@print_invoice')->name('invoice.print');
		Route::get('/daily/report','Admin\InvoiceController@daily_report')->name('invoice.daily.report');
		Route::get('/daily/report/pdf','Admin\InvoiceController@daily_report_pdf')->name('invoice.daily.report.pdf');


	});

	//product route
	Route::prefix('/stock')->group(function(){

		Route::get('/list','Admin\StockController@all_stock')->name('stock.view');
		Route::get('/report/pdf','Admin\StockController@stock_report_pdf')->name('stock.report.pdf');



	});


});


