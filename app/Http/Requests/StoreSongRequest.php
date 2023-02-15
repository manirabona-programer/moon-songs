<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreSongRequest extends FormRequest {
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, mixed>
         */
        public function rules() {
            return [
                'title' => ['string', 'required'],
                'length' => ['string', 'required'],
                'genre_id' => ['integer', 'required'],
                'album_id' => ['integer', 'required']
            ];
        }
    }
