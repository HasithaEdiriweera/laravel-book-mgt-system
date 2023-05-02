<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

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


// Public routes

// login apis
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// books api
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{book}', [BookController::class, 'show']);
Route::get('/books/search/{title}', [BookController::class, 'search']);
Route::get('/books/{book}/author',  [BookController::class, 'getAllAuthorsByBook']);

// author api
Route::get('/author',  [AuthorController::class, 'getAuthors']);
Route::get('/author/{author}',  [AuthorController::class, 'getAuthorById']);
Route::get('/author/search/{name}',  [AuthorController::class, 'searchAuthorByName']);
Route::get('/author/{author}/books',  [AuthorController::class, 'getAllBooksByAuthor']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // books api
    Route::post('/books', [BookController::class, 'store']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);
    Route::post('/books/{book}/authors',[BookController::class, 'addAuthorsToBook']);


    // author api
    Route::post('/author', [AuthorController::class, 'createAuthor']);
    Route::put('/author/{author}', [AuthorController::class, 'updateAuthor']);
    Route::delete('/author/{id}', [AuthorController::class, 'deleteAuthor']);
    Route::post('/author/{author}/books', [AuthorController::class, 'addBooksToAuthor']);

    // userlogout
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
