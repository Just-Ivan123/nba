<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use nba2\app\Http\Middleware\Authenticate;
 use nba2\app\Http\Middleware\AuthMiddleware;
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

Route::get('/signin', [AuthController::class, 'getSignIn']);
Route::get('/signup', [AuthController::class, 'getSignUp']);
Route::post('/signin', [AuthController::class, 'signIn']);
Route::post('/signup', [AuthController::class, 'signUp']);
Route::get('/signout', [AuthController::class, 'signOut']);

Route::post('/createcomment', [CommentController::class, 'store']);
Route::get('/', [TeamController::class, 'index']);
Route::get('/teams/{id}', [TeamController::class, 'show']);
Route::get('/players/{id}', [PlayerController::class, 'show']);
