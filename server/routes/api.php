<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class,'login']);


Route::get('/user', function (Request $request) {

    var_dump(auth()->check());
    if (!auth()->check()) {
        return response()->json(['error' => 'Token inválido ou expirado'], 401);
    }

    // Recuperar o usuário autenticado e tempo de logado
    $user = auth()->user();
    $loginTime = now()->diffInMinutes(auth()->payload()->get('iat')); // iat = "issued at" (tempo desde a emissão do token)

    return response()->json([
        'user' => $user,
        'login_time_in_minutes' => $loginTime,
    ]);
});


Route::post('/register', [UserController::class,'store'])->middleware('auth.custom');

