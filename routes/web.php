<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\Authenticate;
 use App\Http\Middleware\AuthMiddleware;
 
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
Route::get('/signin/{id}', [AuthController::class, 'verify']);
Route::get('/signin', [AuthController::class, 'getSignIn']);
Route::get('/signup', [AuthController::class, 'getSignUp']);
Route::post('/signin', [AuthController::class, 'signIn']);
Route::post('/signup', [AuthController::class, 'signUp']);
Route::get('/signout', [AuthController::class, 'signOut']);

Route::post('/createcomment', [CommentController::class, 'store'])->middleware('bad');
Route::get('/forbidden-comment', function(){return view('forbidden-comment');});
Route::get('/', [TeamController::class, 'index'])->middleware('auth');
Route::get('/teams/{id}', [TeamController::class, 'show'])->middleware('auth');
Route::get('/players/{id}', [PlayerController::class, 'show'])->middleware('auth');
