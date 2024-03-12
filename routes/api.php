<?php

use App\Http\Controllers\Api\AssessmentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('response', function () {

    $question_withSQ = Question::has('sub_questions')->with(['sub_questions', 'sub_questions.options'])->get();
    $question_withoutSQ = Question::doesntHave('sub_questions')->with('options')->get();

    $questions = $question_withSQ->merge($question_withoutSQ);

    $categories = Category::all();
    $categories = $categories->map(function ($category) use ($questions) {
        return [
            $category->name => $questions->where('category_id', $category->id)
        ];
    });

    return response()->json($categories);
});

Route::post('answer/', [AssessmentController::class, 'storeAnswer']);
Route::get('answer/{category}', [AssessmentController::class, 'getAnswer']);
Route::get('question/{category}', [AssessmentController::class, 'getQuestion']);
