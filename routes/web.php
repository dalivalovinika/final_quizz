<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('quizzes', QuizController::class);
Route::resource('questions', QuestionController::class);
Route::post('/quizzes/publish/{quiz}', [QuizController::class, 'publish'])->name('quizzes.publish');
Route::get('/quizzes/start/{quiz}', 'QuizController@start')->name('quizzes.start');
Route::post('/quizzes/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
Route::get('/quizzes/show/{quiz}', 'QuizController@show')->name('quizzes.show');
Route::get('/quizzes/start/{quiz}', 'App\Http\Controllers\QuizController@start')->name('quizzes.start');
Route::get('/quizzes/results/{quiz}/{score}', [QuizController::class, 'results'])->name('quizzes.results');

