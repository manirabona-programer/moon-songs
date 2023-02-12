<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Genre extends Model {
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = ['name'];

        /**
         * Genre has many songs
         * @return HasMany
         */
        public function genre() :HasMany {
            return $this->hasMany(Song::class);
        }
    }
