<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
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

Route::get('/nord', [Controller::class, 'nord'])->name('nord');

Route::get('/proxi', [Controller::class, 'proxi'])->name('proxi');

Route::get('/sud', [Controller::class, 'sud'])->name('sud');

Route::get('/est', [Controller::class, 'est'])->name('est');

Route::get('/ouest', [Controller::class, 'ouest'])->name('ouest');

Route::get('/details/{id}', [Controller::class, 'details'])->name('details');

Route::get('/about', [Controller::class, 'about'])->name('about');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('/moncv', function () {
    return view('moncv');
});

Route::post('/mail', [MailController::class, 'sendMessageGoogle']);

Route::get('/register', function () {
    return view('/');
});