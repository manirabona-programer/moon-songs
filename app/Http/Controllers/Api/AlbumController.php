<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreAlbumRequest;
    use App\Http\Resources\AlbumResource;
    use App\Models\Album;
    use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            $imageUrl = Cloudinary::uploadFile(
                $request->file('cover_image')->getRealPath(),
                $options = array('public_id' => 'moon-songs/' . $request->cover_image)
            )->getSecurePath();

            $album = user()->albums()->create([
                'title' => $request->title,
                'release_date' => $request->release_date,
                'cover_image' => $imageUrl,
                'description' => $request->description
            ]);

            return successResponse(AlbumResource::make($album), "Album created");
        }

        /**
         * Display the specified resource.
         *
         * @param  Album $album
         * @return \Illuminate\Http\Response
         */
        public function show(Album $album) {
            return successResponse(AlbumResource::make($album), 'Album listed');
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  StoreAlbumRequest $request
         * @param  Album $album
         * @return \Illuminate\Http\Response
         */
        public function update(StoreAlbumRequest $request, Album $album) {
            $album = $album->update($request->validated());
            return successResponse(AlbumResource::make($album), 'Album Updated');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Album $album) {
            $album->delete();
            return successResponse(null, 'album Deleted');
        }
    }
