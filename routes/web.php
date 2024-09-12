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
Route::get('news/details/{id}', [CoreController::class, 'newsDetails'])->name('news_details');
Route::get('programs/details/{id}', [CoreController::class, 'programDetails'])->name('program_details');

// data
Route::get('data/header_images', [CoreController::class, 'headerImages'])->name('data.header_images');
Route::get('data/header_slider_texts', [CoreController::class, 'headerSliderTexts'])->name('data.header_slider_texts');
Route::get('data/about_us_segments', [CoreController::class, 'aboutUsSegments'])->name('data.about_us_segments');
Route::get('data/pillars', [CoreController::class, 'pillars'])->name('data.pillars');
Route::get('data/programs', [CoreController::class, 'programs'])->name('data.programs');
Route::get('data/testimonials', [CoreController::class, 'testimonials'])->name('data.testimonials');
Route::get('data/partners', [CoreController::class, 'partners'])->name('data.partners');
Route::get('data/contacts', [CoreController::class, 'contacts'])->name('data.contacts');
Route::get('data/blog_posts', [CoreController::class, 'blogPosts'])->name('data.blog_posts');

