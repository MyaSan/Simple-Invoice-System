<?php
Route::get('/invoice','InvoicelistController@index');

Route::post('/save','InvoicelistController@add');

Route::get('/updateitem/{invoice_id}','InvoicelistController@dataupdate');

Route::get('/remove/{invoice_id}','InvoicelistController@delete');

Route::get('/additem',function() {
	return view('additem');
});

Route::get('/pdfview/{invoice_id}',array('as'=>'pdfview','uses'=>'InvoicelistController@pdfview'));

Route::post('/search','InvoicelistController@search');

Route::post('/update','InvoicelistController@updateitem');

Route::post('/invoice','InvoicelistController@search');