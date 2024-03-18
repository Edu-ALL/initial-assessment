<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AssessmentController;
use App\Http\Controllers\Api\AuthController;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAnswerController;

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

Route::middleware(['auth:api', 'scopes:client'])->group(function () {

    Route::get('check', [AuthController::class, 'checkAuth']);
    Route::post('signout', [AuthController::class, 'signOut']);
});

Route::post('answer/{category}', [AssessmentController::class, 'storeAnswer']);
Route::get('answer/{category}', [AssessmentController::class, 'getAnswer']);
Route::get('question/{category}', [AssessmentController::class, 'getQuestion']);
Route::get('sub_option/{curriculum}', [AssessmentController::class, 'getSubOption']);
Route::get('ranking', [AssessmentController::class, 'getRanking']);
Route::get('report', [AssessmentController::class, 'getReport']);
Route::get('checklist_quest', [AssessmentController::class, 'checklistQuest']);

# Auth
Route::post('signin', [AuthController::class, 'signIn']);


# Admin
Route::prefix('admin')->group(function () {

    Route::post('signin', [AdminController::class, 'signIn']);

    Route::middleware(['auth:api', 'scopes:admin'])->group(function () {

        Route::post('signout', [AdminController::class, 'signOut']);
    });
});
