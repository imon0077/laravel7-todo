<?php

Route::get('/todos', 'TodoController@index')->name('todolist');
Route::get('/todos/create', 'TodoController@create')->name('createtodo');
Route::post('/todos/create', 'TodoController@store');

Route::get('/todos/{id}/edit', 'TodoController@edit')->name('todo.edit');
//Route::get('/todos/edit/{id}', 'TodoController@edit');
Route::patch('/todos/{id}/update', 'TodoController@update')->name('todo.update');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
