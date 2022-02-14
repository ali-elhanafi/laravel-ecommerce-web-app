<?php



use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductApiController;
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
//public routes
//Route::resource('/products',ProductApiController::class);
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);
Route::get('/products/search/{title}', [ProductApiController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//protected routes
Route::group(['middleware'=>['auth:sanctum']],function (){
    Route::post('/products', [ProductApiController::class, 'store']);
    Route::put('/products/{id}', [ProductApiController::class, 'update']);
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
