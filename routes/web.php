<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AjaxController;

/*


->name(uniqueName);

then refer to it by route(uniqueName)
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

//Route::post('products',[PagesController::class , 'potato']);
Route::get('products-get',[PagesController::class , 'potato'])->name('products-get');

Route::any('products-post',[PagesController::class , 'tomato'])->name('products-post');
Route::any('products-post2',[PagesController::class , 'tomato2'])->name('products-post2');

Route::any('AddProduct',[PagesController::class , 'tomato3'])->name('AddProduct');

Route::any('changePrice',[PagesController::class , 'changePrice'])->name('changePrice');
Route::any('updatePrice',[AjaxController::class , 'updatePrice'])->name('updatePrice');

Route::any('getCategories',[AjaxController::class , 'getCategories'])->name('getCategories');
Route::any('getBrands',[AjaxController::class , 'getBrands'])->name('getBrands');

Route::any('editProductInfo',[PagesController::class , 'editProductInfo'])->name('editProductInfo');

//insteadOf the above you can use Route::any;
//get a product 
Route::any('getProduct-post',[AjaxController::class , 'getProduct_post'])->name('getProduct-post');
Route::any('consoleLog-post',[AjaxController::class , 'consoleLog_post'])->name('consoleLog-post');




//editProductInfo
Route::any('getNonEmptyBrands',[AjaxController::class , 'getNonEmptyBrands'])->name('getNonEmptyBrands');
Route::any('updateProductInfo',[AjaxController::class , 'updateProductInfo'])->name('updateProductInfo');
Route::any('checkBaracodesConflict',[AjaxController::class , 'checkBaracodesConflict'])->name('checkBaracodesConflict');

// for showing the $_POST request sent
Route::any('test',[PagesController::class , 'test'])->name('test');


Route::any('addProduct-post',[PagesController::class , 'addProduct_post'])->name('addProduct-post');
Route::any('change-dollar',[PagesController::class , 'ChangeDollar'])->name('ChangeDollar');
Route::any('addCategoriesBrands',[PagesController::class , 'addCategoriesBrands'])->name('addCategoriesBrands');
Route::post('change-dollar-post',[AjaxController::class , 'ChangeDollar_post'])->name('ChangeDollar_post');
Route::post('change-defaultProfit-post',[AjaxController::class , 'change_defaultProfit_post'])->name('change-defaultProfit-post');

Route::get('/error-productFound',function(){
    return view('errors/error-productFound');
}
);

Route::get('/csrf',function(){
    return view('php-scripts/csrf');
}
);

Route::any('login',[UserController::class , 'login']
)->name('login');

/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/ 




//Resources made local
/*
//Route::any('/fonts/googleapis/com/css',[AjaxController::class , 'familyNunito']
)->name('familyNunito');
*/
