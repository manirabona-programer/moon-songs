<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Song extends Model {
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'album_id',
            'genre_id',
            'title',
            'length'
        ];

        /**
         * Songs belongs to genre
         * @return BelongsTo
         */
        public function genre() :BelongsTo {
            return $this->belongsTo(Genre::class);
        }

        /**
         * Songs belongs to album
         * @return BelongsTo
         */
        public function album() :BelongsTo {
            return $this->belongsTo(Album::class);
        }
    }
