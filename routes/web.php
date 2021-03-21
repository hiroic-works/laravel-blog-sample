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

// ブログ一覧
Route::get('/', [BlogController::class, 'showList'])->name('blogs');

Route::get('/blog/{id}', [BlogController::class, 'showDetail'])->name('show');

// Route::get('/', function() {
//     return 'hellow';
// })->name('blogs');
