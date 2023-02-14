<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreAlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;

    class AlbumController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index() {
            return successResponse(
                AlbumResource::collection(user()->albums),
                "Albums listed"
            );
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  StoreAlbumRequest $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreAlbumRequest $request) {
            $album = user()->albums()->create($request->validated());
            return successResponse($album, "Album created");
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
