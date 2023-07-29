<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * Retorna uma resposta de sucesso em formato JSON
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $message = 'Success', $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Retorna uma resposta de falha em formato JSON
     *
     * @param  string  $error
     * @param  string  $message
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($error, $message = 'Error', $statusCode = 400)
    {
        return response()->json([
            'success' => false,
            'error' => $error,
            'message' => $message
        ], $statusCode);
    }
}