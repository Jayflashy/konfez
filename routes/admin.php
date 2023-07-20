<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Back\{
    AdminController,PostController,StaffController,RoleController,LanguageController,SettingController,PageController,UserController,MessageController
};
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UpdateController;

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin')->name('admin');
Route::middleware('admin')->prefix('admin')->group(function(){
    Route::controller(AdminController::class)->as('admin.')->group(function(){
        Route::get('/' , 'index')->name('index');
        Route::get('/dashboard' , 'index')->name('dashboard');
        Route::get('/profile' , 'profile')->name('profile');
        Route::post('/profile' , 'update_profile')->name('profile');
    });
    // Confessions
    Route::controller(PostController::class)->as('confessions.')->prefix('confessions')->group(function(){
        Route::get('/' , 'index')->name('index');
        Route::get('/settings' , 'settings')->name('settings');
        Route::post('/update/{id}', 'update_confession')->name('update');
        Route::get('/edit/{id}', 'edit_confession')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/status/{id}/{status}', 'update_status')->name('status');
    });
    // Categories
    Route::controller(PostController::class)->as('category.')->prefix('category')->group(function(){
        Route::get('/' , 'categories')->name('index');
        Route::post('/create', 'create_category')->name('create');
        Route::post('/update/{id}', 'update_category')->name('update');
        Route::get('/edit/{id}', 'edit_category')->name('edit');
        Route::get('/delete/{id}', 'delete_category')->name('delete');
    });
    // Comments
    Route::controller(PostController::class)->as('comments.')->prefix('comments')->group(function(){
        Route::get('/' , 'comments')->name('index');
        Route::get('/edit/{id}', 'edit_comment')->name('edit');
        Route::post('/update/{id}', 'update_comment')->name('update');
        Route::get('/status/{id}/{status}', 'comment_status')->name('status');
        Route::get('/delete/{id}', 'delete_comment')->name('delete');
    });
    // Messages
    Route::controller(MessageController::class)->prefix('messages')->as('messages.')->group(function(){
        Route::get('/' , 'index')->name('index');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });
    //Users
    Route::controller(UserController::class)->prefix('users')->as('users.')->group(function(){
        Route::get('/' , 'index')->name('index');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');        
        Route::post('/update/{id}', 'update')->name('update');
    });
    // Pages
    Route::controller(PageController::class)->prefix('pages')->as('pages.')->group(function () {
        Route::get('/',  'index')->name('index');
        Route::get('/create',  'create')->name('create');
        Route::get('/edit/{id}',  'edit')->name('edit');
        Route::get('/delete/{id}',  'delete')->name('delete');        
        Route::post('/store',  'store')->name('store');
        Route::post('/update/{id}',  'update')->name('update');
    });
    // Languages
    Route::controller(LanguageController::class)->prefix('language')->as('language.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create',  'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/status/{id}/{status}', 'status')->name('status');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/translate/{id}', 'translate')->name('translate');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/translate_key', 'translate_key')->name('translate_key');
        Route::post('/save_key/{id}', 'save_key')->name('save_key');
        Route::post('/edit_key/{id}', 'edit_key')->name('edit_key');
    });
    // Staff Roles
    Route::controller(RoleController::class)->prefix('roles')->as('roles.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create',  'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
    });
    // System staffs
    Route::controller(StaffController::class)->prefix('staffs')->as('staffs.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
    });
    // Promotions  
    Route::controller(PromoController::class)->group(function(){        
        Route::get('/newsletter', 'newsletter')->name('newsletter.index');
        Route::post('/newsletter/send', 'send_newsletter')->name('newsletter.send');
        Route::post('/test-smtp', 'test_smtp')->name('test.smtp');
        Route::get('/advertising', 'advertising')->name('advertising.index');
    });

    // Website Settings
    Route::controller(SettingController::class)->group(function(){
        Route::get('/settings',  'general_setting')->name('settings.index');
        Route::get('/features',  'features')->name('features.index');  
        Route::get('/smtp-settings', 'smtp')->name('smtp.index');
        Route::get('/google-settings', 'google')->name('google_settings.index');
        Route::get('/facebook-settings', 'facebook')->name('facebook.index');
        
        Route::post('settings/update', 'update')->name('settings.update');  
        Route::post('settings/features', 'updateFeatures')->name('features.update');
        Route::post('settings/system', 'systemUpdate')->name('sys_settings.update');
        Route::post('settings/system/store', 'store_settings')->name('store_settings.update');   
        Route::post('env_key/update', 'envkeyUpdate')->name('env_key.update');     
    });
    
    // Sysytem Update
    Route::get('/system/update', [UpdateController::class, 'index'])->name('system.update');
    Route::post('/update/files', [UpdateController::class, 'saveFile'])->name('update.postfile'); 
    Route::get('/update/finish', [UpdateController::class, 'finish'])->name('update.finish');
    Route::get('/cache-clear', [AdminController::class, 'clearCache'])->name('clear.cache');
    Route::get('/maintenance', [AdminController::class, 'maintenance'])->name('maintenance');

});
