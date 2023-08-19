<?php

use App\Http\Controllers\Admin\CateogoryController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('categories', CateogoryController::class);

Route::get('/checked.php', function () {
    return view('checked');
});
Route::get('/checker.php', [CateogoryController::class, 'create']);
Route::post('/checker.php', [CateogoryController::class, 'create']);
Route::get('/checked.php', [CateogoryController::class, 'store']);
