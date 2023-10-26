<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

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


Route::controller(MainController::class)->group(function () {
    Route::get('/', 'homePage')->name('home');
    Route::get('/user/{id}/{user}', 'userProfile')->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->name('user.profile');
    Route::get('/view-profile/user/{user}', 'showUserProfile')->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->name('user.profile.view');
});

Route::controller(ForumController::class)->group(function () {
    Route::get('/forums', 'index')->name('forums');

    Route::get('/forums/create', 'createForum')->name('forum.create');
    Route::get('/forums/{id?}', 'singleForum')->name('forum.single');
});

Route::controller(TopicController::class)->group(function () {
    Route::get('/topics', 'index')->name('topics');
    Route::get('/topics/create', 'createTopic')->name('topic.create');
    Route::get('/topics/{id}', 'single')->name('topic.single');
    Route::get('/topics/{id}/edit', 'editTopic')->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->name('topic.edit');
});

Route::controller(QuizController::class)->group(function () {
    Route::get('/quiz', 'index')->name('quizzes');
    Route::get('/quiz/create', 'createQuiz')->name('quiz.create');
    Route::get('/quiz/{id?}', 'single')->name('quiz.single');
    Route::get('/quiz/{id}/edit', 'editQuiz')->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->name('quiz.edit');
});

Route::controller(NotesController::class)->group(function () {
    Route::get('/notes', 'index')->name('notes');
    Route::get('/notes/upload', 'uploadNote')->name('note.upload');

    Route::get('/notes/{note}/download', 'download')->name('note.download');
    Route::get('/notes/create', 'createNote')->name('note.create');
    Route::get('/notes/{id?}', 'single')->name('note.single');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/forums/create', [ForumController::class, 'createForum'])->name('forum.create');
    Route::get('/topics/create', [TopicController::class, 'createTopic'])->name('topic.create');
    Route::get('/quizzes/create', [QuizController::class, 'createQuiz'])->name('quiz.create');
});




// Route::get('test', function () {
//     event(new App\Events\MessageSent('Someone'));
//      return redirect()->back()->withInput();
// });



Route::get('/chat/{id}', [ChatController::class, 'index']);
Route::post('/chat/send', [ChatController::class, 'sendMessage']);
Route::post('/chat/messages', 'ChatController@sendMessage');
