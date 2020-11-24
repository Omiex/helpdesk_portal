<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProblemController;

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
	return redirect()->route('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('user', function () {
	return view('user.index');
})->middleware(['auth', 'role:admin'])->name('user.index');

Route::resource('problem', ProblemController::class)->middleware(['auth', 'role:user']);

// Route::get('/blog', [Controller::class, 'index']);
