<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropZoneController;
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

Route::get('/', [DropZoneController::class, 'index']);

//Route for submitting dropzone data
Route::post('/storeimgae', [DropZoneController::class, 'storeImage']);
Route::post('/updateimage', [DropZoneController::class, 'updateImage'])->name('updateimage');
Route::post('/storeupdatedimage', [DropZoneController::class, 'storeUpdateImage']);

Route::resource('dropzone', DropZoneController::class);
