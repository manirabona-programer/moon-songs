<?php

    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    if (!function_exists('user')) {
        /**
         * Return the authenticated user model.
         *
         * @return Authenticatable|null|User
         */
        function user() {
            return Auth::user();
        }
    }
