<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\habits;
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

Route::get('getdata/{id}', function (Request $req, $id) {
    $habislogs = habits::countLogsByDate($id);
    $habitinfo = habits::recordHabit($id);
    $result = ["logs" => ["index" => array_keys($habislogs), "value" => array_values($habislogs)], "info" => $habitinfo];
    return response()->json(['code' => 200, 'msg' => "Berhasil Puh", "result" => $result]);
})->name('api.getdata');