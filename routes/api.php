<?php
use App\http\Controllers\API\AppointmentController;
use App\http\Controllers\API\AuthController;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('register',[AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//Route::middleware('auth:api')->group( function (){
    Route::post('appointment', [AppointmentController::class, 'store'])/*->middleware('auth:api')*/;
    
//});
