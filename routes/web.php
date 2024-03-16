<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [QuestionController::class, 'getActiveQuestions']);
    Route::get('edit', [QuestionController::class, 'editView'])->middleware('isAdmin');
    Route::post('create_question', [QuestionController::class, 'create'])->name('create_question');
    Route::post('send_answer', [AnswerController::class, 'reply'])->name('send_answer');
    Route::get('stats', [QuestionController::class, 'index'])->name('stats');
    Route::get('answers/{id}/{type}', [AnswerController::class, 'index'])->name('answers');
    Route::put('update_question', [QuestionController::class, 'update'])->name('update_question');
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
});

Route::get('/login', [Login::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [Login::class, 'store'])->name('login')->middleware('guest');

Route::get('/{any}', function () {
    return redirect('/');
})->where('any', '.*');