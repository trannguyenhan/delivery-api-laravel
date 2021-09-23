<?php

namespace App;

use Illuminate\Http\JsonResponse;

class Helper
{
    /**
     * @param null $data
     * @return JsonResponse
     */
    public static function successResponse($data = null): JsonResponse
    {
        $is = is_array($data); // check type of $data

        if($is){
            return response()->json([
                'code' => \App\Constants::CODE_SUCCESS,
                'message' => 'successfully',
                'total' => count($data),
                'data' => $data
            ]);
        }

        // else $data is not array
        return response()->json([
           'code' => \App\Constants::CODE_SUCCESS,
           'message' => 'successfully',
           'data' => $data
        ]);
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    public static function successResponseWithToken($token): JsonResponse
    {
        return response()->json([
            'code' => \App\Constants::CODE_SUCCESS,
            'token' => $token,
            'type' => 'bearer'
        ]);
    }

    /**
     * @param null $message
     * @return JsonResponse
     */
    public static function errorResponse($message = null): JsonResponse
    {
        return response()->json([
           'code' => \App\Constants::CODE_ERROR,
           'message' => $message? $message : null,
        ]);
    }
}
