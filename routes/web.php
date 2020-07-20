<?php

// Route::get('/todos', 'TodoController@index')->name('todo.index');
// Route::get('/todos/create', 'TodoController@create')->name('todo.create');
// Route::post('/todos/create', 'TodoController@store');
// Route::get('/todos/{id}/edit', 'TodoController@edit')->name('todo.edit');
// Route::patch('/todos/{id}/update', 'TodoController@update')->name('todo.update');
// Route::delete('/todos/{id}/delete', 'TodoController@delete')->name('todo.delete');

//Route::middleware('auth')->group(function(){
    Route::resource('todo', 'TodoController');
    Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
    Route::put('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
//});




Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
