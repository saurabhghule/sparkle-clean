<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'WebsiteController@home']);

Route::get('/about-us', ['as' => 'about', 'uses' => 'WebsiteController@about']);

Route::get('/download', ['as' => 'download', 'uses' => 'WebsiteController@downloads']);

Route::get('/team', ['as' => 'team', 'uses' => 'WebsiteController@team']);

Route::get('/our-reach', ['as' => 'our-reach', 'uses' => 'WebsiteController@ourReach']);

Route::get('/quality-policy', ['as' => 'quality', 'uses' => 'WebsiteController@quality']);

Route::get('/contact-us', ['as' => 'contact', 'uses' => 'WebsiteController@contact']);
Route::post('/contact/post', ['as' => 'contact.post', 'uses' => 'WebsiteController@contactPost']);
Route::post('/product_support/post', ['as' => 'product_support.post', 'uses' => 'WebsiteController@productSupportPost']);
Route::get('/product-support', ['as' => 'product_support', 'uses' => 'WebsiteController@productSupport']);

Route::get('/clients', ['as' => 'clients', 'uses' => 'WebsiteController@clientsAndConsultants']);

Route::get('/careers', ['as' => 'careers', 'uses' => 'WebsiteController@careers']);
Route::post('/careers', ['as' => 'careers', 'uses' => 'WebsiteController@careersPost']);

Route::get('/commercial-sector', ['as' => 'commercial-sector', 'uses' => 'WebsiteController@sectors']);
Route::get('/industrial-sector', ['as' => 'industrial-sector', 'uses' => 'WebsiteController@sectors']);
Route::get('/government-sector', ['as' => 'government-sector', 'uses' => 'WebsiteController@sectors']);
Route::get('/oil-and-gas-sector', ['as' => 'oil-and-gas-sector', 'uses' => 'WebsiteController@sectors']);

Route::get('/water-management-solution', ['as' => 'water-management-solution', 'uses' => 'WebsiteController@solutions']);
Route::get('/waste-water-management-solution', ['as' => 'waste-water-management-solution', 'uses' => 'WebsiteController@solutions']);
Route::get('/drinking-water-solution', ['as' => 'drinking-water-solution', 'uses' => 'WebsiteController@solutions']);
Route::get('/zero-liquid-discharge-solution', ['as' => 'zero-liquid-discharge-solution', 'uses' => 'WebsiteController@solutions']);
Route::get('/oil-and-gas-solution', ['as' => 'oil-and-gas-solution', 'uses' => 'WebsiteController@solutions']);
Route::get('/other-solutions', ['as' => 'other-solution', 'uses' => 'WebsiteController@solutions']);

Route::get('/water-management-project', ['as' => 'water-management-project', 'uses' => 'WebsiteController@projects']);
Route::get('/waste-water-management-project', ['as' => 'waste-water-management-project', 'uses' => 'WebsiteController@projects']);
Route::get('/government-project', ['as' => 'government-project', 'uses' => 'WebsiteController@projects']);

Route::get('/depth-filtration-technology', ['as' => 'depth-filtration-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/micro-membrane-technology', ['as' => 'micro-membrane-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/ion-exchange-technology', ['as' => 'ion-exchange-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/ro-technology', ['as' => 'ro-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/setting-coagulation-flocculation-technology', ['as' => 'setting-coagulation-flocculation-oil-seperation-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/oil-seperation-technology', ['as' => 'oil-seperation-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/membrane-bio-reactor-technology', ['as' => 'membrane-bio-reactor-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/activated-sludge-technology', ['as' => 'actuated-sludge-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/attached-growth-process-technology', ['as' => 'attached-growth-process-technology', 'uses' => 'WebsiteController@technologies']);
Route::get('/other-technologies', ['as' => 'other-technology', 'uses' => 'WebsiteController@technologies']);

Route::get('/case-studies/{slug?}', ['as' => 'case-studies', 'uses' => 'WebsiteController@caseStudies']);

Route::get('/sitemap', ['as' => 'site-map', 'uses' => 'WebsiteController@siteMap']);

Route::get('/products/{product_slug?}', ['as' => 'products', 'uses' => 'WebsiteController@products']);

Route::post('/send/subscription', ['as' => 'send.subscription', 'uses' => 'WebsiteController@sendSubscription']);






