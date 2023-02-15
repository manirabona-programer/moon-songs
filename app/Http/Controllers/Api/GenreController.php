<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreGenreRequest;
    use App\Http\Resources\GenreResource;
    use App\Models\Genre;

    class GenreController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index() {
            return GenreResource::collection(
                user()->genres()
                    ->where('active_status', true)
                    ->orderBy('created_at', 'desc')->get()
            );
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  StoreGenreRequest $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreGenreRequest $request) {
            $genre = user()->genres()->create($request->validated());

            return successResponse(
                GenreResource::make($genre),
                "Your Genre created and published"
            );
        }

        /**
         * Display the specified resource.
         *
         * @param  Genre $genre
         * @return \Illuminate\Http\Response
         */
        public function show(Genre $genre) {
            return GenreResource::make($genre);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  StoreGenreRequest $request
         * @param  Genre $genre
         * @return \Illuminate\Http\Response
         */
        public function update(StoreGenreRequest $request, Genre $genre) {
            $genre->update($request->validated());

            return successResponse(
                GenreResource::make($genre),
                "Your Genre updated and published"
            );
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Genre $genre
         * @return \Illuminate\Http\Response
         */
        public function destroy(Genre $genre) {
            $genre->active_status = false;
            $genre->save();

            return successResponse(
                GenreResource::make($genre),
                "Your Genre deleted"
            );
        }
    }
