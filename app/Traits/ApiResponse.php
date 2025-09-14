<?php
namespace App\Traits;

trait ApiResponse
{
    // response
    protected function ApiResponse($data, $msg, $code)
    {
        $repsonse = [
            'status' => $code,
            'message' => $msg,
            'data' => $data,
        ];

        return response()->json($repsonse, $code);
    }
}
