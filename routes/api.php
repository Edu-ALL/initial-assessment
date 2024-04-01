<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AssessmentController;
use App\Http\Controllers\Api\AuthController;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAnswerController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => ['auth:api', 'scopes:client']], function () {

    Route::get('check', [AuthController::class, 'checkAuth']);
    Route::post('signout', [AuthController::class, 'signOut']);
    Route::get('question/{category}', [AssessmentController::class, 'getQuestion']);
    Route::post('answer/{category}', [AssessmentController::class, 'storeAnswer']);
    Route::get('answer/{category}', [AssessmentController::class, 'getAnswer']);
    Route::get('sub_option/{curriculum}', [AssessmentController::class, 'getSubOption']);
    Route::get('ranking', [AssessmentController::class, 'getRanking']);
    Route::post('took_quest', [UserController::class, 'updateTookQuest']);
});

Route::get('report/{user}', [AssessmentController::class, 'getReport']);
Route::get('report_quest/{user}', [AssessmentController::class, 'getReportQuest']);
Route::get('report/{user}/summary', [AssessmentController::class, 'getReportSummary']);

# Auth
Route::post('signin', [AuthController::class, 'signIn']);


# Admin
Route::prefix('admin')->group(function () {

    Route::post('signin', [AdminController::class, 'signIn']);

    Route::group(['middleware' => ['auth:api', 'scopes:admin']], function () {

        Route::get('get/', [UserController::class, 'dashboard']);
        Route::get('get/clients', [UserController::class, 'index']);
        Route::get('get/client/{client_uuid}', [UserController::class, 'show']);

        Route::post('signout', [AdminController::class, 'signOut']);
    });
});
