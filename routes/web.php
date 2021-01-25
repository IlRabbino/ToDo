<?php

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

Route::get('/', 'App\Http\Controllers\TodoController@index');
Route::put('/update/{$id}', function($id){
    $todo = App\Models\Todo::find($id);
    $todo->title = request('title');
    $todo->save();
    return redirect('/');
});
Route::resource('todo', 'App\Http\Controllers\TodoController');
