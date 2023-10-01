<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
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
Route::get('/', function () {
    return view('home');
})->name('home');



Route::controller(ForumController::class)->group(function () {
    Route::get('/forums', 'index')->name('forums');

    Route::get('/forums/create', 'createForum')->name('forum.create');
    Route::get('/forums/{id?}', 'singleForum')->name('forum.single');
});

Route::controller(TopicController::class)->group(function () {
Route::get('/topics', 'index')->name('topics');
    Route::get('/topics/create', 'createTopic')->name('topic.create');
Route::get('/topics/{id}', 'single')->name('topic.single');
});

Route::controller(QuizController::class)->group(function () {
    Route::get('/quizzes', 'index')->name('quizzes');
    Route::get('/quizzes/create', 'createQuiz')->name('quiz.create');
    Route::get('/quizzes/{id?}', 'single')->name('quiz.single');
});

Route::controller(NotesController::class)->group(function () {
    Route::get('/notes', 'index')->name('notes');
    Route::get('/notes/upload', 'uploadNote')->name('note.upload');

    Route::get('/notes/{note}/download',  'downloadNote')->name('note.download');
    Route::get('/notes/create', 'createNote')->name('note.create');
    Route::get('/notes/{id?}', 'single')->name('note.single');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});




// Route::get('test', function () {
//     event(new App\Events\MessageSent('Someone'));
//      return redirect()->back()->withInput();
// });



Route::get('/chat/{id}', [ChatController::class,'index']);
Route::post('/chat/send', [ChatController::class,'sendMessage']);
Route::post('/chat/messages', 'ChatController@sendMessage');
