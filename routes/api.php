<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Persons
Route:: get('/persons',                    [PersonController::class, 'index']);
Route:: get('/person/{personId}',          [PersonController::class, 'show']);
Route:: post('/persons',                   [PersonController::class, 'store']);
Route:: put('/persons/{personId}',         [PersonController::class, 'update']);
Route:: delete('/persons/{personId}',      [PersonController::class, 'destroy']);

