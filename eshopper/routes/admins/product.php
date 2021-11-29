<?php
//Product
Route::prefix('product1')->group(function () {
    Route::get('/',[
        'as'=>'product.index',
        'uses'=>'App\Http\Controllers\AdminProductController@index',
        // 'middleware'=>'can:product-list'

                         ]);
    Route::get('/create',[
        'as'=>'product.create',
        'uses'=>'App\Http\Controllers\AdminProductController@create'
                         ]);
    Route::post('/store',[
        'as'=>'product.store',
        'uses'=>'App\Http\Controllers\AdminProductController@store'
                         ]);
    Route::get('/edit/{id}',[
        'as'=>'product.edit',
        'uses'=>'App\Http\Controllers\AdminProductController@edit',
        // 'middleware'=>'can:product-edit,id'

                         ]);
    Route::post('/update/{id}',[
        'as'=>'product.update',
        'uses'=>'App\Http\Controllers\AdminProductController@update'
                         ]);

     Route::get('/delete/{id}',[
        'as'=>'product.delete',
        'uses'=>'App\Http\Controllers\AdminProductController@delete'
                         ]);
    
     
}); 