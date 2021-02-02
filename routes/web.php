<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiPictureController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\HomeController;
use App\Models\User;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

// Category Routes go here

Route::get('all/category', [CategoryController::class, 'allCategory'])->name('all-category');
Route::post('store/category', [CategoryController::class, 'addCategory'])->name('store-category');
Route::get('edit/category/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('update/category/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');
Route::get('soft/delete/category/{id}', [CategoryController::class, 'softDeleteCategory'])->name('softDelete-category');
Route::get('restore/category/{id}', [CategoryController::class, 'restoreCategory'])->name('restore-category');
Route::get('pdelete/category/{id}', [CategoryController::class, 'pdeleteCategory'])->name('pdelete-category');


Route::middleware(['auth'])->group(function () {
    // Brand Routes Go Here
    Route::get('all/brand', [BrandController::class, 'index'])->name('all-brand');
    Route::post('store/brand', [BrandController::class, 'addBrand'])->name('store-brand');
    Route::get('edit/brand/{id}', [BrandController::class, 'editBrand'])->name('edit-brand');
    Route::post('update/brand/{id}', [BrandController::class, 'updateBrand'])->name('update-brand');
    Route::get('delete/brand/{id}', [BrandController::class, 'deletebrand'])->name('delete-brand');
});


// Multi Image Routes Go Here
Route::get('multi/image',[MultiPictureController::class,'index'])->name('multi-image');
Route::post('store/multi/image',[MultiPictureController::class,'storeImage'])->name('store-image');

// Slider Routes Go Here
Route::get('home/slider',[HomeController::class,'homeSlider'])->name('home-slider');
Route::get('add/slider',[HomeController::class,'addSlider'])->name('add-slider');
Route::post('create/slider',[HomeController::class,'createSlider'])->name('create-slider');

// Home About Routes go here
Route::get('home/about',[AboutController::class,'homeAbout'])->name('home-about');
Route::get('add/about',[AboutController::class,'addAbout'])->name('add-about');
Route::post('create/about',[AboutController::class,'createAbout'])->name('create-about');
Route::get('edit/about/{id}',[AboutController::class,'editAbout'])->name('edit-about');
Route::post('update/about/{id}',[AboutController::class,'updateAbout'])->name('update-about');
Route::get('delete/about/{id}',[AboutController::class,'deleteAbout'])->name('delete-about');

Route::get('home/protfolio',[MultiPictureController::class,'index'])->name('home-protfolio');

// user password and profile change routes go here
Route::get('change/password',[ChangePassword::class,'changePassword'])->name('password-change');
Route::post('update/password',[ChangePassword::class,'updatePassword'])->name('update-password');
Route::get('update/profile',[ChangePassword::class,'updateProfile'])->name('update-profile');
Route::post('update/profile/Info',[ChangePassword::class,'updateProfileInfo'])->name('update-profile-info');


Route::get('about',function(){
    return view('about');
})->middleware('age');

Route::get('home',function(){
    return view('home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    return view('admin.pages.dashboard');
})->name('dashboard');

Route::get('user/logout',[AuthController::class,'userLogout'])->name('user-logout');
