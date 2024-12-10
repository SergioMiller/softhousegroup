<?php
declare(strict_types=1);

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/log', [LogController::class, 'log']);
Route::get('/log-to/{type}', [LogController::class, 'logTo'])->whereIn('type', array_keys(config('log.channels')));
Route::get('/log-to-all', [LogController::class, 'logToAll']);
