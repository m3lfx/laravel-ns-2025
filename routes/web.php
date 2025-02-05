<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListenerController;
use App\Http\Controllers\HomeController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

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

    // return Redirect::to('/my/long/calendar/route');
    return Redirect::route('calendar');
});


Route::get('/second', function () {
    return 'Second route.';
});

// Route::get('file/download', function () {
//     $file = 'C:\Users\rommel dalisay\Desktop\2T-2025-att.txt';
//     return Response::download($file);
// });

// Route::get('/example', function () {
//     // $squirrel = 
//     $data['manyThings'] = array('one', 'two', 'three', 'four');
//     return view('example', $data );
// });

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/item', function () {
//     return view('item');
// });

// Route::view('/item', 'item');

// Route::get(
//     '/my/long/calendar/route',
//     function () {
//         return view('calendar');
//     }
// )->name('calendar');
// Route::get('save/{princess}', function ($princess) {
//     return "Sorry, {$princess} is in another castle. :(";
// })->where('princess', '[A-Za-z]+');

// Route::get('save/{princess}/{unicorn}', function ($princess, $unicorn) {
//     return "{$princess} loves {$unicorn}";
// })->where('princess', '[A-Za-z]+')
//     ->where('unicorn', '[0-9]+');


Route::prefix('artists')->group(function () {

    Route::get('/', [ArtistController::class, 'index'])->name('artist.index')->middleware('auth');
    Route::get('/create', [ArtistController::class, 'create'])->name('artist.create')->middleware('auth');
    Route::post('/store', [ArtistController::class, 'store'])->name('artist.store')->middleware('auth');
    Route::get('/edit/{id}', [ArtistController::class, 'edit'])->name('artist.edit')->middleware('auth');
    Route::post('/update/{id}', [ArtistController::class, 'update'])->name('artist.update')->middleware('auth');
    Route::get('/delete/{id}', [ArtistController::class, 'delete'])->name('artist.delete')->middleware('auth');

    
});



Route::view('/register', 'user.register');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register'); 
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile'); 

Route::get('/listeners/add-album', [ListenerController::class, 'addAlbums'])->name('listeners.addAlbums');
Route::post('/listeners/add-album', [ListenerController::class, 'addAlbumListener'])->name('listeners.addAlbumListener');
Route::get('/listeners/edit-album', [ListenerController::class, 'editAlbumListener'])->name('listeners.editAlbumListener');



Route::get('/listeners/{id}/restore',  [ListenerController::class, 'restore'])->name('listeners.restore');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('signin', [UserController::class,'postSignin'])->name('user.signin');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::put('/listeners/update-albums', [ListenerController::class, 'updateAlbums'])->name('listeners.updateAlbums');


Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::resource('listeners', ListenerController::class);
Route::resource('albums', AlbumController::class)->middleware('auth');

