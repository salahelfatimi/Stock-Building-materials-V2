<?php

use App\Http\Controllers\controleDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[controleDate::class,'login']);
Route::post('controlerDetails',[controleDate::class,'controlerDetails']);

Route::post('designationDetails',[controleDate::class,'designationDetails']);
Route::post('ajouteDesignation',[controleDate::class,'ajouteDesignation']);
Route::post('serachControlerValide',[controleDate::class,'serachControlerValide']);

