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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/test', function() {

    $repository = app()->make('CodeDelivery\Repositories\CategoryRepository');
    return $repository->all();

});

Route::group(['prefix'=>'admin', 'middleware' => 'auth.checkrole:admin', 'as' => 'admin.'], function() {

    Route::get('categories', ['as'=>'categories.index', 'uses' => 'CategoryController@index']);
    Route::get('categories/create', ['as'=>'categories.create', 'uses' => 'CategoryController@create']);
    Route::get('categories/edit/{id}', ['as'=>'categories.edit', 'uses' => 'CategoryController@edit']);
    Route::post('categories/update/{id}', ['as'=>'categories.update', 'uses' => 'CategoryController@update']);
    Route::post('categories/store', ['as'=>'categories.store', 'uses' => 'CategoryController@store']);
    Route::get('categories/delete/{id}', ['as'=>'categories.delete', 'uses' => 'CategoryController@destroy']);

    Route::get('clients', ['as'=>'clients.index', 'uses' => 'ClientController@index']);
    Route::get('clients/create', ['as'=>'clients.create', 'uses' => 'ClientController@create']);
    Route::get('clients/edit/{id}', ['as'=>'clients.edit', 'uses' => 'ClientController@edit']);
    Route::post('clients/update/{id}', ['as'=>'clients.update', 'uses' => 'ClientController@update']);
    Route::post('clients/store', ['as'=>'clients.store', 'uses' => 'ClientController@store']);
    Route::get('clients/delete/{id}', ['as'=>'clients.delete', 'uses' => 'ClientController@destroy']);

    Route::get('products', ['as'=>'products.index', 'uses' => 'ProductController@index']);
    Route::get('products/create', ['as'=>'products.create', 'uses' => 'ProductController@create']);
    Route::get('products/edit/{id}', ['as'=>'products.edit', 'uses' => 'ProductController@edit']);
    Route::post('products/update/{id}', ['as'=>'products.update', 'uses' => 'ProductController@update']);
    Route::post('products/store', ['as'=>'products.store', 'uses' => 'ProductController@store']);
    Route::get('products/delete/{id}', ['as'=>'products.delete', 'uses' => 'ProductController@destroy']);

    Route::get('orders', ['as'=>'orders.index', 'uses' => 'OrderController@index']);
    Route::get('orders/{id}', ['as'=>'orders.edit', 'uses' => 'OrderController@edit']);
    Route::post('orders/update/{id}', ['as'=>'orders.update', 'uses' => 'OrderController@update']);

    Route::get('cupoms', ['as'=>'cupoms.index', 'uses' => 'CupomController@index']);
    Route::get('cupoms/create', ['as'=>'cupoms.create', 'uses' => 'CupomController@create']);
    Route::get('cupoms/edit/{id}', ['as'=>'cupoms.edit', 'uses' => 'CupomController@edit']);
    Route::post('cupoms/update/{id}', ['as'=>'cupoms.update', 'uses' => 'CupomController@update']);
    Route::post('cupoms/store', ['as'=>'cupoms.store', 'uses' => 'CupomController@store']);
    Route::get('cupoms/delete/{id}', ['as'=>'cupoms.delete', 'uses' => 'CupomController@destroy']);

});

Route::group(['prefix'=>'customer', 'middleware' => 'auth.checkrole:client', 'as' => 'customer.'], function() {
    Route::get('order', ['as'=>'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('order/create', ['as'=>'order.new', 'uses' => 'CheckoutController@create']);
    Route::post('order/store', ['as'=>'order.store', 'uses' => 'CheckoutController@store']);
});




Route::group(['middleware' => 'cors'], function(){

    Route::post('oauth/access_token', function() {
        return Response::json(Authorizer::issueAccessToken());
    });

    Route::group(['prefix'=>'api', 'middleware' => 'oauth', 'as' => 'api.'], function() {

        Route::group(['prefix'=>'client', 'middleware' => 'oauth.checkrole:client', 'as' => 'client.'], function() {
            Route::resource('order',
            'Api\Client\ClientCheckoutController',
            ['except'    =>  ['create', 'edit', 'destroy']
            ]);

            Route::get('products', 'Api\Client\ClientProductController@index');
        });

        Route::group(['prefix'=>'deliveryman', 'middleware' => 'oauth.checkrole:deliveryman', 'as' => 'deliveryman.'], function() {
            Route::resource('order',
                'Api\Deliveryman\DeliverymanCheckoutController',
                ['except'    =>  ['create', 'edit', 'destroy']
            ]);
            Route::patch('order/{id}/update-status/',
                [
                    'uses'  => 'Api\Deliveryman\DeliverymanCheckoutController@updateStatus',
                    'as'    => 'orders.update_status'
                ]);
        });

        Route::get('authenticated ', 'Api\Client\ClientController@authenticated');
    });
});

