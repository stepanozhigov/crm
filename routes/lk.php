<?php

use Illuminate\Support\Facades\Route;

$lkDomain = env('LK_DOMAIN');
$subdomains = explode('|', env('LK_SUBDOMAINS'));

foreach ($subdomains as $subdomain) {
    Route::domain($subdomain.$lkDomain)->name($subdomain)->group(function () {

        Route::group(['middleware'=>['setlocale']],function() {
            Auth::routes(['verify' => false, 'reset' => false, 'register' => false, 'confirm' => false]);
        });

        Route::group(['middleware' => ['auth.client:client,superClient','setlocale']], function () {
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/product/{product}', 'HomeController@product')->name('product');
            Route::get('/comment/{comment}', 'HomeController@comment')->name('comment');
            Route::get('/buy/{product}', 'HomeController@buy')->name('buy');
            Route::get('/constructor', 'HomeController@constructor')->name('constructor');
            Route::get('/consult/', 'HomeController@consult')->name('consult');
            Route::get('/consult/{gender?}', 'HomeController@consultPrice')->name('consultPrice');
            Route::get('/consult-vip/', 'HomeController@consultVip')->name('consult-vip');
            Route::get('/available-courses', 'HomeController@availableCourses')->name('available-courses');

            // Статические страницы
            Route::view('/privatpolicy', 'lk.privatpolicy')->name('privatpolicy');
            Route::view('/publichnyj-dogovor-oferta', 'lk.public-oferta')->name('public-oferta');
        });
    });
}
