<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreSongRequest;
    use App\Http\Resources\SongResource;
    use App\Models\Song;

    class SongController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index() {
            $songs = user()->albums->songs;
            return SongResource::collection($songs);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  StoreSongRequest $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreSongRequest $request) {
            $song = user()->albums()->where('id', $request->album_id)
                        ->first()->songs()->create([
                            'genre_id' => $request->genre_id,
                            'title' => $request->title,
                            'length' => $request->length
                        ]);

            return successResponse(SongResource::make($song), "Song created");
        }

        /**
         * Display the specified resource.
         *
         * @param  Song $song
         * @return \Illuminate\Http\Response
         */
        public function show(Song $song) {
            return successResponse(SongResource::make($song), "Song Listed");
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  StoreSongRequest $request
         * @param  Song $song
         * @return \Illuminate\Http\Response
         */
        public function update(StoreSongRequest $request, Song $song) {
            $song->update($request->validated());
            $song->refresh();
            return successResponse(SongResource::make($song), 'Song updated');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Song $song) {
            $song->delete();
            return successResponse(null, 'Song deleted');
        }
    }
