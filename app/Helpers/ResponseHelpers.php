<?php

    use Illuminate\Http\JsonResponse;

    if (!function_exists('successResponse')) {
        /**
         * Handle the success response for Ajax requests
         *
         * @param mixed $data The data to be passed to the response
         * @param string|null $message The message to be passed to the response
         * @param int $code The response status code
         * @return JsonResponse
         */
        function successResponse($data = null, ?string $message = null, int $code = 200): JsonResponse {
            $res = [
                'message' => $message,
                'data' => $data,
                'success' => true,
            ];

            return response()->json($res, $code);
        }
    }

    if (!function_exists('errorResponse')) {
        /**
         * Handle the success response for Ajax requests
         *
         * @param string|null $message The message to be passed to the response
         * @param int $code The response status code
         * @param null $errors
         * @return JsonResponse
         */
        function errorResponse(string $message = null, int $code = 400, $errors = null): JsonResponse {
            $res = [
                'message' => $message,
                'errors' => $errors,
                'success' => false,
                // 'status_code' => $code
            ];

            return response()->json($res, $code);
        }
    }
