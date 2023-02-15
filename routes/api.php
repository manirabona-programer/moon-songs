<?php

    use App\Http\Controllers\Api\AlbumController;
    use App\Http\Controllers\Api\GenreController;
    use App\Http\Controllers\Api\SongController;
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

    Route::middleware('auth:api')->group(function() {
        /**
         * --------------------------------
         * GENRE API ROUTES
         * --------------------------------
         */
        Route::get('/genres', [GenreController::class, 'index'])->name('get.genres');
        Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('show.genres');
        Route::post('/genres', [GenreController::class, 'store'])->name('store.genres');
        Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('update.genres');
        Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('delete.genres');

        /**
         * --------------------------------
         * ALBUM API ROUTES
         * --------------------------------
         */
        Route::get('/albums', [AlbumController::class, 'index'])->name('get.albums');
        Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('show.albums');
        Route::post('/albums', [AlbumController::class, 'store'])->name('store.albums');
        Route::post('/albums/{album}', [AlbumController::class, 'update'])->name('update.albums');
        Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('delete.albums');

        /**
         * --------------------------------
         * ALBUM API ROUTES
         * --------------------------------
         */
        Route::get('/songs', [SongController::class, 'index'])->name('get.songs');
        Route::get('/songs/{song}', [SongController::class, 'show'])->name('show.songs');
        Route::post('/songs', [SongController::class, 'store'])->name('store.songs');
        Route::put('/songs/{song}', [SongController::class, 'update'])->name('update.songs');
        Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('delete.songs');
    });
