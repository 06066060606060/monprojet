<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MapsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\API\GraffsController;
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
    return view('index');
});

Route::get('/maps/{region}', [MapsController::class, 'getMaps'])->name('getMaps');
Route::get('/details/{id}', [MapsController::class, 'details'])->name('details');
Route::get('/about', [Controller::class, 'about'])->name('about');
Route::post('/mail', [MailController::class, 'sendMessageGoogle']);

Route::apiResource("/api/graffs", GraffsController::class);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin/register', function () {
  
});