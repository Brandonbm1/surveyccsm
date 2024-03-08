<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [QuestionController::class, 'getActiveQuestions']);
Route::get('edit', function () {
    return view('pages.edit');
});
Route::post('create_question', [QuestionController::class, 'create'])->name('create_question');
Route::post('send_answer', [AnswerController::class, 'reply'])->name('send_answer');
Route::get('stats', [QuestionController::class, 'index'])->name('stats');
Route::get('answers/{id}/{type}', [AnswerController::class, 'index'])->name('answers');