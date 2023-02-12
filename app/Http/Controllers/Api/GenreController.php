<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreGenreRequest;
    use App\Models\Genre;

    class GenreController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index() {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  StoreGenreRequest $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreGenreRequest $request) {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  Genre $genre
         * @return \Illuminate\Http\Response
         */
        public function show(Genre $genre) {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  StoreGenreRequest $request
         * @param  Genre $genre
         * @return \Illuminate\Http\Response
         */
        public function update(StoreGenreRequest $request, Genre $genre) {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Genre $genre
         * @return \Illuminate\Http\Response
         */
        public function destroy(Genre $genre) {
            //
        }
    }
