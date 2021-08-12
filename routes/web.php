<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BotManController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MeetController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::match(['get', 'post'], '/botman', [BotManController::class,'handle']);


Route::get('/botmans', function () {
    return view('botman');
})->name('botman');

Route::get('test', [MessageController::class,'test'])->name('test');

Route::get('coba', [MeetController::class,'loginMeet'])->name('coba');


Route::get('test2', [MessageController::class,'test2'])->name('test2');
Route::group(['middleware'=>'auth'],function(){
    Route::get('profile/', [UserController::class,'profile'])->name('profile');
    Route::post('create_profile/', [UserController::class,'create_profile'])->name('create_profile');

    Route::get('chat/', [MessageController::class,'index'])->name('chat');
    Route::get('chat/{user_id}', [MessageController::class,'privatechat'])->name('privatechat');
    Route::post('send/', [MessageController::class,'send'])->name('send');
    Route::post('getMsg/', [MessageController::class,'getMsg'])->name('getMsg');
    
});