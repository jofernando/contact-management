<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FakeAuth;
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

Route::redirect('/', '/contacts');

Route::get('/login', [FakeAuth::class, 'login'])->name('login');
Route::post('/login', [FakeAuth::class, 'fakeLogin'])->name('fakeLogin');
Route::get('/logout', [FakeAuth::class, 'logout'])->name('logout')->middleware('auth');

Route::resource('contacts', ContactController::class)->middleware('auth')->except('index');
Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
