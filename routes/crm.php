<?php

use Illuminate\Support\Facades\Route;


Route::domain(env('CRM_DOMAIN'))->name('crm.')->group(function () {
    //base auth
    Auth::routes(['verify' => false, 'reset' => false, 'register' => false, 'confirm' => false]);

    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/', 'HomeController@index')->name('home');

        //CRUDs
        Route::resource('users', 'UsersController')->except(['destroy', 'show']);
        Route::resource('products', 'ProductsController')->except(['destroy', 'show']);
        Route::resource('clients', 'ClientsController')->except(['destroy', 'show']);
        Route::resource('projects', 'ProjectsController')->except(['destroy', 'show']);
        Route::resource('discounts', 'DiscountsController')->except(['destroy', 'show']);
        Route::resource('bills', 'BillsController')->except(['destroy', 'show']);
        Route::resource('tags', 'TagsController')->except(['destroy', 'show']);
        Route::resource('webinars', 'WebinarsController')->except(['destroy', 'show']);
        Route::resource('payment-methods', 'PaymentMethodsController')->except(['destroy', 'show']);
        Route::resource('mailer-groups', 'MailerGroupController')->except(['destroy', 'show']);
        Route::resource('mailer-subscribers', 'ClientMailerliteController')->only(['index', 'create', 'store']);
        Route::resource('comments', 'CommentsController')->only(['index', 'edit']);
        Route::resource('constructors', 'ConstructorsController')->only(['index', 'edit', 'update']);
        Route::resource('up-sales', 'UpSalesController')->except(['destroy', 'show']);
        Route::resource('bill-page', 'BillPageController')->except(['destroy', 'show']);
        Route::resource('consult-page', 'ConsultPageController')->except(['destroy', 'show']);
        Route::resource('emails', 'EmailsController')->only(['index', 'show']);
        Route::resource('super-client', 'SuperClientController')->only(['index', 'update']);


        Route::get('sales-report', 'SalesReportController@index')->name('sales-report');


        //translates crud
        Route::get('/translates', 'TranslatesController@index')->name('translates');
        Route::get('/translates/apply', 'TranslatesController@apply')->name('translates.apply');
        Route::get('/translates/create', 'TranslatesController@create')->name('translates.create');
        Route::post('/translates/create', 'TranslatesController@store')->name('translates.store');
        Route::get('/translates/scan', 'TranslatesController@scan')->name('translates.scan');
    });


});


