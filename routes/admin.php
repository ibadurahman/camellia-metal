<?php

use Illuminate\Support\Facades\Route;

Route::get('/user/data', 'DataController@users')->middleware(['verified'])->name('user.data');
Route::get('/workorder/data', 'DataController@workorders')->middleware(['verified'])->name('workorder.data');
Route::get('/workorder/dataonprocess', 'DataController@workordersOnProcess')->middleware(['verified'])->name('workorder.dataonprocess');
Route::get('/workorder/dataclosed', 'DataController@workordersClosed')->middleware(['verified'])->name('workorder.dataclosed');
Route::get('/production/data', 'DataController@productions')->middleware(['verified'])->name('production.data');
Route::get('/oee/data', 'DataController@oees')->middleware(['verified'])->name('oee.data');
Route::get('/smelting/data_wo', 'DataController@wo_smeltings')->middleware(['verified'])->name('smelting.data_wo');
Route::get('/smelting/data', 'DataController@smeltings')->middleware(['verified'])->name('smelting.data');


Route::resource('user','UserController');

Route::resource('smelting','SmeltingController');
Route::post('smelting/addSmelting','SmeltingController@addSmelting')->middleware(['verified'])->name('smelting.addSmelting');

Route::resource('workorder','WorkorderController');
Route::post('/workorder/updateOrder', 'WorkorderController@updateOrder')->middleware(['verified'])->name('workorder.updateorder');

Route::resource('production','ProductionController');

Route::resource('oee','OeeController');

