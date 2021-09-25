<?php

use App\Http\Controllers\AuthController;
use App\Modules\Essays\UseCases\CreateEssay\CreateEssayController;
use App\Modules\Essays\UseCases\CreateEssayCorrection\CreateEssayCorrectionController;
use App\Modules\Users\UseCases\AuthenticateUser\AuthenticateUserController;
use App\Modules\Users\UseCases\CreateUser\CreateUserController;
use App\Modules\Users\UseCases\CreateUserRole\CreateUserRoleController;
use App\Modules\Users\UseCases\GetUserById\GetUserByIdController;
use App\Modules\Users\UseCases\ListUsers\ListUsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('/login', [AuthenticateUserController::class, 'handle']);
Route::post('/users', [CreateUserController::class, 'handle']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/users', [ListUsersController::class, 'handle']);
    Route::post('/users-role', [CreateUserRoleController::class, 'handle']);
    Route::post('/essays', [CreateEssayController::class, 'handle']);
    Route::put('/essay-correction/{id}', [CreateEssayCorrectionController::class, 'handle']);
    Route::get('/users/{id}', [GetUserByIdController::class, 'handle']);
});
