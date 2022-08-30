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

Route::post('/create-people',[PeopleController::class, 'createPeople'])->name('createPeople');

Route::get('/get-people',[PeopleController::class, 'getPeople'])->name('getPeople');

Route::get('/s', [PeopleController::class, 'searchPeople'])->name('search1');

Route::delete('/delete-people/{id}', [PeopleController::class, 'deletePeople'])->name('delete');

Route::get('/update-people/{id}', [PeopleController::class, 'getPeopleById'])->name('getPeopleById');

Route::patch('/update-people/{id}', [PeopleController::class, 'updatePeople'])->name('updatePeople');

// vaness
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
