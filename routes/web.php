<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/artists', [ArtistController::class, 'index'] );
// Route::get('/books/{genre}', function ($genre) {
//     return "Books in the {$genre} category.";
//     });
// Route::get('/books/{id}', function ($id) {
//     return "Books in the {$id} number category.";
// });

// Route::get('/books/{genre?}', function ($genre = 'crime') {
//     if ($genre == null) {
//         return 'Books index.';
//     }
//     return "Books in the {$genre} category.";
// });

Route::get('/first', function () {

    return Redirect::to('second');
});


Route::get('/second', function () {
    return 'Second route.';
});

Route::get('file/download', function () {
    $file = 'C:\Users\rommel dalisay\Desktop\2T-2025-att.txt';
    return Response::download($file);
});

Route::get('/example', function () {
    // $squirrel = 
    $data['manyThings'] = array('one', 'two', 'three', 'four');
    return view('example', $data );
});
