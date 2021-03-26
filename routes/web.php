<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
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

// ※Laravel8のルーティング設定　https://qiita.com/tamakiiii/items/e71040173fa0a1fcad83

// ブログ一覧画面
Route::get('/', [BlogController::class, 'showList'])->name('blogs');

// ブログ登録画面
Route::get('/blog/create', [BlogController::class, 'showCreate'])->name('create');

// ブログ登録
Route::post('/blog/store', [BlogController::class, 'exeStore'])->name('store');

// ブログ詳細画面
Route::get('/blog/{id}', [BlogController::class, 'showDetail'])->name('show');

// ブログ編集画面
Route::get('/blog/edit/{id}', [BlogController::class, 'showEdit'])->name('edit');

// ブログ編集
Route::post('/blog/update', [BlogController::class, 'exeUpdate'])->name('update');

// ブログ削除
Route::post('/blog/delete/{id}', [BlogController::class, 'exeDelete'])->name('delete');

// Route::get('/', function() {
//     return 'hellow';
// })->name('blogs');
