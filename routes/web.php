<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Googleauth;
use App\Livewire\CarIndex;
use App\Livewire\Carmake;
use App\Livewire\Dealers;
use App\Livewire\Forgotpassword;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\SearchResult;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home');
Route::get('/search',SearchResult::class)->name('search');

Route::get('/cars/{carmake}/{carmodel}/',CarIndex::class)->name('car.index');


Route::prefix('brand')->group(function(){
  Route::get('/{slug}',Carmake::class)->name('brand.one');
});

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/login',Login::class)->name('login');
    Route::get('/register',Register::class)->name('register');
    Route::get('/forgot-password',Forgotpassword::class)->name('forgot.password');

    Route::get('/google/redirect',[Googleauth::class,'redirect'])->name('google.redirect');
    Route::get('/google/callback',[Googleauth::class,'callback'])->name('google.callback');
});

Route::prefix('dealer')->group(function () {
  Route::get('/{dealer_slug}',Dealers::class)->name('dealers.home');
});

Route::prefix('auth')->group(function(){
  Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});