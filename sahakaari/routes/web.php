<?php

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/savings', 'SavingsController');
    Route::resource('/loan', 'LoanController');
    Route::resource('/share', 'ShareController');
    Route::resource('/food', 'FoodController');
    Route::resource('/harvester', 'HarvesterController');

    // extra share routes
    Route::post('/share-balance/{id}', 'ShareController@shareBalance')->name('share.balance');
    Route::post('/savings-balance/{id}', 'SavingsController@savingBalance')->name('savings.balance');
    Route::post('/loan-balance/{id}', 'LoanController@loanBalance')->name('loan.balance');
    Route::get('/get-share-details', 'SavingsController@getShareDetails')->name('get-share-details');
    Route::post('/update-buy-n-sell', 'FoodController@updateBuyAndSell')->name('update-buy-n-sell');
    Route::get('/buy-n-sell', 'FoodController@buyAndSell')->name('buy-n-sell');

    // ** route for charts
    Route::get('/savings-chart', 'GraphController@savings')->name('graph.savings');

    // ** import excel file in database
    Route::get('/import', 'ImportController@index')->name('import.index');
    Route::post('/import-savings', 'ImportController@savingsImport')->name('import.import_excel');
});
