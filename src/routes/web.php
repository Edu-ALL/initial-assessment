<?php

use App\Http\Controllers\Api\AssessmentController;
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

// Route::get('report_quest', [AssessmentController::class, 'getReportQuest']);

Route::get('/{any?}', function () {
    return view('application');
})->where('any', '.*');

Route::get('signin/u/{client_uuid}', [AuthController::class, 'signInByUUID']);
