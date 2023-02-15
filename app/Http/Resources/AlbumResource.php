<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    class AlbumResource extends JsonResource {
        /**
         * Transform the resource into an array.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
         */
        public function toArray($request) {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'release_date' => $this->release_date,
                'description' => $this->description,
                'cover_image' => $this->cover_image,
                'songs' => SongResource::collection($this->songs),
                'created_at' => $this->created_at
            ];
        }
    }
