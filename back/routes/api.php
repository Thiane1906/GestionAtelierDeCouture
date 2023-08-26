<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleVenteController;
use App\Http\Controllers\CategorieController;
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
Route::put("categories/{category}",[CategorieController::class,'update']);
Route::post("categories/delete",[CategorieController::class,'deleteCategories']);
Route::apiResource("categories",CategorieController::class);
Route::apiResource("articles",ArticleController::class);
Route::get("categorie/{id}",[ArticleController::class,"getNbreDeLibelleDuneCategorie"]);
Route::get("catFour",[ArticleController::class,"articleFournisseur"]);
Route::apiResource("articleVente",ArticleVenteController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
