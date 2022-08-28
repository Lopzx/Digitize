<?php

use App\Http\Controllers\PeopleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',[PeopleController::class,'getCreatePage'])->name('getCreatePage');

Route::post('/create-people', [PeopleController::class, 'createPeople'])->name('createPeople');
