<?php

use App\Models\User;
use App\Services\TweetService;
use Database\Seeders\Helpers\Tweet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;

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

Route::get('/area51', function () {
	$tweetService = new TweetService;
	dd($tweetService->parseTweet('Hello'));
	return view('area51');
})->name('area51');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
	Route::post('/follow/{user:username}', [FollowController::class, 'toggleFollow'])->name('follow');
});


require __DIR__ . '/auth.php';


Route::get('/{user:username}', [UserController::class, 'show'])->name('user.show');
Route::get('/{user:username}/followers', [UserController::class, 'followers'])->name('user.followers');
Route::get('/{user:username}/following', [UserController::class, 'following'])->name('user.following');