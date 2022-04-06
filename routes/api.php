<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Product Category
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tag
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Content Page
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');

    // Sub Cat
    Route::post('sub-cats/media', 'SubCatApiController@storeMedia')->name('sub-cats.storeMedia');
    Route::apiResource('sub-cats', 'SubCatApiController');

    // Vendor
    Route::post('vendors/media', 'VendorApiController@storeMedia')->name('vendors.storeMedia');
    Route::apiResource('vendors', 'VendorApiController');

    // Driver
    Route::post('drivers/media', 'DriverApiController@storeMedia')->name('drivers.storeMedia');
    Route::apiResource('drivers', 'DriverApiController');

    // Unit
    Route::apiResource('units', 'UnitApiController');

    // Variation
    Route::apiResource('variations', 'VariationApiController');
});
