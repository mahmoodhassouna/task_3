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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('all_sponsors',[\App\Http\Controllers\SponsorsController::class,'all_sponsors'])->name('all_sponsors');

Route::get('sponsors/create',[\App\Http\Controllers\SponsorsController::class,'create'])->name('create_sponsors');
Route::delete('sponsors/delete/{id}',[\App\Http\Controllers\SponsorsController::class,'destroy']);

Route::delete('sponsors/personalsponsor/{id}',[\App\Http\Controllers\SponsorsController::class,'personalsponsor']);
Route::delete('sponsors/institutionsponsor/{id}',[\App\Http\Controllers\SponsorsController::class,'institutionsponsor']);

Route::post('sponsors/storePersonalSponsor',[\App\Http\Controllers\SponsorsController::class,'storePersonalSponsor']);
Route::post('sponsors/storeInstitutionSponsor',[\App\Http\Controllers\SponsorsController::class,'storeInstitutionSponsor']);

Route::get('sponsors/editPersonalSponsor/{id}',[\App\Http\Controllers\SponsorsController::class,'editPersonalSponsor']);
Route::get('sponsors/editInstitutionSponsor/{id}',[\App\Http\Controllers\SponsorsController::class,'editInstitutionSponsor']);

Route::post('sponsors/updatePersonal/{id}',[\App\Http\Controllers\SponsorsController::class,'updatePersonal']);
Route::post('sponsors/updateInstitution/{id}',[\App\Http\Controllers\SponsorsController::class,'updateInstitution']);

Route::get('sponsors/search',[\App\Http\Controllers\SponsorsController::class,'search'])->name('search_sponsors');

Route::post('sponsors/searchPersonalSponsor',[\App\Http\Controllers\SponsorsController::class,'searchPersonalSponsor']);
Route::post('sponsors/searchInstitutionSponsor',[\App\Http\Controllers\SponsorsController::class,'searchInstitutionSponsor']);

