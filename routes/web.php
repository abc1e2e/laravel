<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Checklogin;
use App\User;
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
// Route::get('index',[
// 	'as'=>'test',
// 	'uses'=>'PageController@getIndex'
// ]);
// Route::get('them',[
// 		'as'=>'insert',
// 		'uses'=>'PageController@getInsert'
// 	]);
// 	Route::post('them',[
// 		'as'=>'insert',
// 		'uses'=>'PageController@postInsert'
// 	]);
Route::get('thong-tin-kh',[
	'as'=>'insert',
	'uses'=>'PageController@insertform'
]);

Route::post('thong-tin-kh',[
	'as'=>'insert',
	'uses'=>'PageController@insert'
]);
Route::get('show-user',[
	'as'=>'show-user',
	'uses'=>'PageController@show'
])->middleware('Checklogin');
Route::get('trang-chu',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getTrangChu'
]);
Route::get('add-sanpham',[
	'as'=>'add-sanpham',
	'uses'=>'AdminController@getAddSanPham'
])->middleware('Checklogin');
Route::post('add-sanpham',[
	'as'=>'add-sanpham',
	'uses'=>'AdminController@postAddSanPham'
])->middleware('Checklogin');
Route::get('list-sanpham',[
	'as'=>'list-sanpham',
	'uses'=>'AdminController@getListSanPham'
])->middleware('Checklogin');
// Route::post('list-sanpham',[
// 	'as'=>'list-sanpham',
// 	'uses'=>'AdminController@postListSanPham'
// ])->middleware('Checklogin');
Route::get('delete-sanpham/{id}',[
	'as'=>"delete-sanpham",
	'uses'=>'AdminController@deleteSanPham'
])->middleware('Checklogin');
Route::get('update-sanpham/{id}',[
	'as'=>"update-sanpham",
	'uses'=>'AdminController@updateSanPham'
])->middleware('Checklogin');
Route::post('update-sanpham/{id}',[
	'as'=>"update-sanpham",
	'uses'=>'AdminController@updatepostSanPham'
])->middleware('Checklogin');
Route::get('list-user',[
	'as'=>'list-user',
	'uses'=>'AdminController@listUser'
])->middleware('Checklogin');
Route::post('list-user',[
	'as'=>'list-user',
	'uses'=>'AdminController@listUser'
])->middleware('Checklogin');
Route::get('delete-user/{id}',[
	'as'=>"delete-user",
	'uses'=>'AdminController@deleteUser'
])->middleware('Checklogin');
Route::get('update-user/{id}',[
	'as'=>"update-user",
	'uses'=>'AdminController@updateUser'
])->middleware('Checklogin');
Route::post('update-user/{id}',[
	'as'=>"update-user",
	'uses'=>'AdminController@updatepostUser'
]);
Route::get('log-in',[
	'as'=>"log-in",
	'uses'=>'PageController@getLogIn'
]);
Route::post('log-in',[
	'as'=>"log-in",
	'uses'=>'PageController@postLogIn'
]);
Route::get('log-out',[
	'as'=>'log-out',
	'uses'=>'PageController@postLogout'
]);
Route::get('register12',[
	'as'=>'register12',
	'uses'=>'PageController@getRegister'
]);
Route::post('register12',[
	'as'=>'register12',
	'uses'=>'PageController@postRegister'
]);
Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dat-hang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dat-hang',
	'uses'=>'PageController@postCheckout'
]);
Route::get('dat-hang/capnhatso',[
	'as'=>'dat-hang/capnhatso',
	'uses'=>'PageController@addQty'
]);
Route::get('list-order',[
	'as'=>"list-order",
	'uses'=>'AdminController@listOrder'
])->middleware('Checklogin');
Route::get('confirm-order/{id}',[
	'as'=>"confirm-order",
	'uses'=>'AdminController@confirmOrder'
])->middleware('Checklogin');
Route::get('delete-order/{id}',[
	'as'=>"delete-order",
	'uses'=>'AdminController@deleteOrder'
])->middleware('Checklogin');
Route::get('detail-order/{id}',[
	'as'=>'detail-order',
	'uses'=>'AdminController@orderDetail'
])->middleware('checkLoginAdmin');
Route::get('list-kh',[
	'as'=>"list-kh",
	'uses'=>'AdminController@listKH'
])->middleware('Checklogin');


// Route for insert data
// Route::get('insert','PageController@insertform');
// Route::post('create','PageController@insert');
// Route::get('view','ViewController@view');

// //View Page
// Route::get('ViewPages', 'ViewController@index');
// Route::post('ViewPages', 'ViewController@index');

// Route::get('ajax-form-submit', 'FormController@index');
// Route::post('ajax-form-submit', 'FormController@index');
// Route::post('save-form', 'FormController@store');

//edite 
// Route::get('edit-records','PageController@index');
// Route::get('edit/{id}','PageController@show');
// Route::post('edit/{id}','PageController@edit');

// //delete data
// Route::get('delete-records','StudDeleteController@index');
// Route::get('delete/{id}','StudDeleteController@destroy');
	



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
