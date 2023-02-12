<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreSongRequest;
    use App\Models\Song;

    class SongController extends Controller {
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
         * @param  StoreSongRequest $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreSongRequest $request) {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  Song $song
         * @return \Illuminate\Http\Response
         */
        public function show(Song $song) {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  StoreSongRequest $request
         * @param  Song $song
         * @return \Illuminate\Http\Response
         */
        public function update(StoreSongRequest $request, Song $song) {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Song $song) {
            //
        }
    }
