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

Route::get('/', 'IndexController@index')->name('index');

Route::group(['prefix' => '/offers'], function() {
    Route::get('/', 'OfferController@offers')->name('offers');
    Route::get('/add', 'OfferController@addOffer')->name('add-offer')->middleware('auth');
    Route::post('/add', 'OfferController@submitAddOffer')->name('submit-offer-add')->middleware('auth');;
    Route::get('/edit/{id_offer}', 'OfferController@editOffer')->name('edit-offer')->middleware('auth');
    Route::post('/edit/{id_offer}', 'OfferController@submitEditOffer')->name('submit-edit-offer')->middleware('checkUser');;
    Route::get('/delete/{id_offer}', 'OfferController@deleteOffer')->name('delete-offer')->middleware('checkUser');
    Route::get('/details/{id_offer}', 'OfferController@detailsOffer')->name('details-offer');
    Route::get('/search}', 'OfferController@searchsOffer')->name('search-offer');

});

Route::group(['prefix' => '/articles'], function() {
    Route::get('/', 'ArticleController@article' )->name('articles');
    Route::get('/add', 'ArticleController@addArticle' )->name('add-article')->middleware('auth');;
    Route::post('/add', 'ArticleController@submitArticle')->name('submit-add-article')->middleware('auth');;
    Route::get('/edit/{id_article}', 'ArticleController@editArticle')->name('edit-article')->middleware('checkUserArticle');;
    Route::post('/edit/{id_article}', 'ArticleController@submitEditArticle')->name('submit-edit-article')->middleware('checkUserArticle');
    Route::get('/delete/{id_article}', 'ArticleController@deleteArticle')->name('delete-article')->middleware('checkUserArticle');
    Route::get('/search}', 'ArticleController@searchsArticle')->name('search-article');

});

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
