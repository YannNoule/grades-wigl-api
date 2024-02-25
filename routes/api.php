<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/grades', [\App\Http\Controllers\GradeController::class, 'index']);
Route::get('/grade/{user}', [\App\Http\Controllers\GradeController::class, 'userGrade']);
Route::get('/cashback/grade/{grade}', [\App\Http\Controllers\GradeController::class, 'gradeCashback']);
Route::get('/cashback/user/{user}', [\App\Http\Controllers\GradeController::class, 'userCashback']);
Route::get('/cashback/user/{user}/amount/{amount}', [\App\Http\Controllers\GradeController::class, 'userAmountCashback']);
