<?php

use App\Http\Controllers\CoreController;
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

Route::get('/', [CoreController::class, 'index']);
Route::get('news', [CoreController::class, 'news'])->name('news');
Route::get('news/details/{id}', [CoreController::class, 'news_details'])->name('news_details');
Route::get('programs/details/{id}', [CoreController::class, 'program_details'])->name('program_details');
