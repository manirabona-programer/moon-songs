<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreAlbumRequest extends FormRequest {
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, mixed>
         */
        public function rules() {
            return [
                'title' => ['required', 'string'],
                'release_date' => ['required', 'string'],
                'cover_image' => ['required', 'image', 'mimes:png,jpg'],
                'description' => ['required', 'string']
            ];
        }
    }
