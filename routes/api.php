<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApiAuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function(){
    return ['name' =>"Manish"];
});


Route::post('/signup',[ApiAuthController::class,'signup']);
Route::post('/login',[ApiAuthController::class,'login']);

Route::group(['middleware'=> 'auth:sanctum'],function () {
Route::get('/students',[StudentController::class,'list'] );
Route::post('/add-student',[StudentController::class,'addStudent']);
Route::put('/update-student',[StudentController::class,'updateStudent']);
Route::delete('/delete-student/{id}',[StudentController::class,'deleteStudent']);
Route::delete('/search-student/{name}',[StudentController::class,'searchStudent']);
});