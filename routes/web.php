<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UserController;

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

//カレンダー画面を表示
Route::get('/', [CalendarController::class, 'showCalendar']) -> name('showCalendar');

//予定があればカレンダーのセルに☆を表示
Route::get('/ajax/{date}/{userID}', [CalendarController::class, 'scheduleCheck']) -> name('scheduleCheck');

//ログイン画面を表示
Route::get('/login', [UserController::class, 'login']) -> name('login');
//ログイン処理
Route::get('/login/process', [UserController::class, 'loginProcess']) -> name('loginProcess');

//ログアウト処理
Route::get('/logout', [UserController::class, 'logout']) -> name('logout');

//ユーザ登録画面を表示
Route::get('/registration', [UserController::class, 'registration']) -> name('registration');
//ユーザ登録処理
Route::post('/registration/process', [UserController::class, 'registrationProcess']) -> name('registrationProcess');

//スケジュール登録フォームを表示
Route::get('/insert', [CalendarController::class, 'insertForm']) -> name('insertForm');
//スケジュール登録処理
Route::post('/insert/process', [CalendarController::class, 'insertProcess']) -> name('insertProcess');

//スケジュール更新フォームを表示
Route::get('/update/{id}', [CalendarController::class, 'updateForm']) -> name('updateForm');
//スケジュール更新処理
Route::post('/update/process', [CalendarController::class, 'updateProcess']) -> name('updateProcess');

//スケジュール削除確認画面を表示
Route::get('/delete/{id}', [CalendarController::class, 'deleteForm']) -> name('deleteForm');
//スケジュール削除処理
Route::post('/delete/process', [CalendarController::class, 'deleteProcess']) -> name('deleteProcess');