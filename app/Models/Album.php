<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Album extends Model {
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'user_id',
            'title',
            'release_date',
            'description',
            'cover_image'
        ];

        /**
         * Album belongs to user
         * @return BelongsTo
         */
        public function user() :BelongsTo {
            return $this->belongsTo(User::class);
        }
    }
