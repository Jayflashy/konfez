<?php

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

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    HomeController, PostController, UserController
};


Route::middleware('maintenance')->group(function(){
    Auth::routes();
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/trending', 'trending')->name('trending');
        Route::get('/search', 'search')->name('search');
        Route::get('/page/{slug}', 'pages')->name('front.page');

        Route::get('/send/finish', 'sent_message')->name('sent.message');
        Route::get('/send/{username}', 'send_message')->name('send.message');
        Route::post('/send/{username}', 'store_message')->name('send.message');
    });
    Route::controller(PostController::class)->group(function(){
        Route::get('/view/{slug}', 'show')->name('view.post');
        Route::get('/confess/', 'create')->name('confess');
        Route::post('/confess/', 'store')->name('confess.store');
        Route::post('/comment/', 'store_comment')->name('comment.store');

        Route::get('/post/edit/{id}', 'edit')->middleware('auth')->name('edit.post');
        Route::post('/post/edit/{id}', 'update')->middleware('auth')->name('update.post');
        Route::get('/post/delete/{id}', 'delete')->middleware('auth')->name('delete.post');

        Route::get('/category/{slug}', 'view_category')->name('view.category');
    });

    //Authenticated user routes 
    Route::middleware('auth')->controller(UserController::class)->as('user.')->group(function(){
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/messages', 'messages')->name('messages');
        // Posts
        Route::get('/posts', 'posts')->name('posts');

        //  Comment
        Route::get('/comments', 'comments')->name('comments');
        Route::get('/delete-comment/{id}', 'delete_comment')->name('delete_comment');
        // Profile
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile', 'update')->name('profile');
        // Report Message
        Route::get('/report-message/{id}', 'report_message')->name('message_report');
        
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');


});
// User Logout
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
// Change Default Language
Route::get('/change-lang/{code}', [HomeController::class, 'change_language'])->name('language.change');
// maintenance mode
Route::get('/maintenance',  [HomeController::class, 'maintenance'])->name('front.maintenance');