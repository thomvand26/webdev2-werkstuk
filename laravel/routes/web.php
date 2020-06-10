<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::name('webhooks.mollie')->post('webhooks/mollie', 'MollieWebhookController@handle');

Route::get('/', function () {
    return redirect('/home');
})->name('home');

Route::prefix('dashboard')->as('dashboard.')->group(function() {
        Route::group([], function () {
            Route::get('/pages', 'DashboardController@getIndexPage')->name('pages.index');
            Route::get('/pages/create', 'DashboardController@getCreatePage')->name('pages.create');
            Route::post('/pages/create', 'DashboardController@postCreatePage')->name('pages.create.post');
            Route::get('/pages/edit/{page}', 'DashboardController@getEditPage')->name('pages.edit');
            Route::post('/pages/edit/{page}', 'DashboardController@postEditPage')->name('pages.edit.post');
            Route::post('/pages/delete/{page}', 'DashboardController@postDeletePage')->name('pages.delete');
            
            Route::get('/articles', 'DashboardController@getIndexArticle')->name('articles.index');
            Route::get('/articles/create', 'DashboardController@getCreateArticle')->name('articles.create');
            Route::post('/articles/create', 'DashboardController@postCreateArticle')->name('articles.create.post');
            Route::get('/articles/edit/{article}', 'DashboardController@getEditArticle')->name('articles.edit');
            Route::post('/articles/edit/{article}', 'DashboardController@postEditArticle')->name('articles.edit.post');
            Route::post('/articles/delete/{article}', 'DashboardController@postDeleteArticle')->name('articles.delete');
            
            Route::get('/apikeys', 'DashboardController@getIndexAPIKey')->name('apikeys.index');
            Route::get('/apikeys/create', 'DashboardController@getCreateAPIKey')->name('apikeys.create');
            Route::post('/apikeys/create', 'DashboardController@postCreateAPIKey')->name('apikeys.create.post');
            Route::get('/apikeys/edit/{apikey}', 'DashboardController@getEditAPIKey')->name('apikeys.edit');
            Route::post('/apikeys/edit/{apikey}', 'DashboardController@postEditAPIKey')->name('apikeys.edit.post');
            Route::post('/apikeys/delete/{apikey}', 'DashboardController@postDeleteAPIKey')->name('apikeys.delete');
            
            Route::get('/donations', 'DashboardController@getIndexDonation')->name('donations.index');
        });
    });

Route::get('/news/{page?}', 'NewsController@index')->name('news');
Route::get('/articles/{article}', 'NewsController@show')->name('news.detail');
    
Route::post('/contact', 'MailController@postContact')->name('cantact.save');
Route::post('/mail/subscribe', 'MailController@subscribe')->name('mail.subscribe');

Route::get('donate', 'DonationController@index')->name('donations.index');
Route::get('donate/success', 'DonationController@success')->name('donations.success');
Route::post('donate', 'DonationController@create')->name('donations.create');

Route::post('locale', 'LocaleController@set')->name('locale');

Auth::routes();

Route::get('/{slug}', 'PageController@getPage')->name('page');
