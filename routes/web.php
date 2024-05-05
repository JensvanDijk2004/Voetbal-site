<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isTeam;
use App\Http\Controllers\TeamController;
use App\Http\Middleware\ApiKeyMiddleware;
use Illuminate\Support\Facades\Route;

//auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

//home
Route::get('/', function () { return view('home'); })->name('home');

//dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

//team
Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/team/show/{team}', [TeamController::class, 'show'])->name('team.show');
Route::get('/team/result/show/{team}', [TeamController::class, 'resultShow'])->name('team.result.show');
Route::get('/team/player/show/{team}', [TeamController::class, 'playerShow'])->name('team.player.show');
Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');

Route::middleware([isTeam::class])->group(function () {
    Route::get('/team/edit/{team}', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/update/{team}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/delete/{team}', [TeamController::class, 'destroy'])->name('team.destroy');
});
Route::middleware('auth')->group(function () {
    Route::post('/team/join/{team}/{user}', [TeamController::class, 'joinTeam'])->name('team.join');
    Route::delete('/team/delete/{team}/{user}', [TeamController::class, 'deleteTeam'])->name('team.delete');
});

//admin
Route::middleware([isAdmin::class])->group(function () {
    Route::resource('/admin', AdminController::class);
    Route::get('/user/admin', [AdminController::class, 'userIndex'])->name('admin.user.index');
    Route::get('/delete/admin', [AdminController::class, 'deleteIndex'])->name('admin.delete.index');
});

//game
Route::get('/game/program/show/{game}', [GameController::class, 'programShow'])->name('game.program.show');
Route::get('/game/result/show/{game}', [GameController::class, 'resultShow'])->name('game.result.show');

Route::middleware([isAdmin::class])->group(function () {
    Route::get('/game/played', [GameController::class, 'playedGames'])->name('game.playedGames');
    Route::post('/game/store', [GameController::class, 'store'])->name('game.store');
});

//api
//Route::middleware([isAdmin::class])->group(function () {
    Route::get('/api/main', [ApiController::class, 'mainIndex'])->name('api.mainIndex');
    Route::any('/api/generate', [ApiController::class, 'generateApiKey'])->name('api.generate');

//    Route::middleware([ApiKeyMiddleware::class])->group(function () {
        Route::post('/api/planned', [ApiController::class, 'plannedGames'])->name('api.planned');
        Route::post('/api/played', [ApiController::class, 'playedGames'])->name('api.played');
        Route::any('/api/overview', [ApiController::class, 'overview'])->name('api.overview');
//    });

    Route::get('/api/played/{id}', [ApiController::class, 'showPlayedGame'])->name('api.played.show');
//});
