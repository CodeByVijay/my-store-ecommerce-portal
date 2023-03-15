<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('forgot-password', [AuthController::class, 'forgot_passwordView'])->name('forgot_password');
Route::get('forgot-password', [AuthController::class, 'forgot_passwordView'])->name('forgot_password');


Route::group(['prefix' => 'admin', 'as'=>'admin.',  'middleware' => 'auth'], function()
{
    Route::get('dashboard',[HomeController::class,'home'])->name('home');

    // Category Module Routes
    Route::get('category/categories',[CategoryController::class,'indexCategoryView'])->name('categoryView');
    Route::get('category/add-new-category',[CategoryController::class,'indexAddCategoryView'])->name('addCategoryView');
    Route::post('category/add-edit-category',[CategoryController::class,'addEditCategoryPost'])->name('addEditCategoryPost');
    Route::get('category/add-new-sub-category',[CategoryController::class,'indexAddSubCategory'])->name('addSubCategoryView');
    Route::get('category/add-new-child-sub-category',[CategoryController::class,'indexAddChildCategory'])->name('addChildCategoryView');
    // Category Module Routes


});
Route::get('/logout', function () {
    Auth::logout();
    Session::flush();
    return redirect()->route('login');
})->name('logout');
