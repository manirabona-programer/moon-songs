<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreAlbumRequest;
    use App\Models\Album;

    class AlbumController extends Controller {
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
         * @param  StoreAlbumRequest $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreAlbumRequest $request) {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  Album $album
         * @return \Illuminate\Http\Response
         */
        public function show(Album $album) {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  StoreAlbumRequest $request
         * @param  Album $album
         * @return \Illuminate\Http\Response
         */
        public function update(StoreAlbumRequest $request, Album $album) {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Album $album) {
            //
        }
    }
