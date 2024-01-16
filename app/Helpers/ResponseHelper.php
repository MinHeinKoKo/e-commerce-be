<?php


namespace App\Helpers;


class ResponseHelper
{
    public static function success($message = "Successful", $data = null, $status = 200)
    {
        return response()->json(
            [
                'msg' => $message,
                'data' => $data
            ],
            $status
        );
    }
    public static function fail($message = "Something went wrong", $status = 500)
    {
        return response()->json(
            [
                'result' => 0,
                'message' => $message,
            ],
            $status
        );
    }

    public static function getPaginationMeta($data)
    {
        return [
            'currentPage' => $data->currentPage(),
            'totalPages' => $data->lastPage(),
            'startOffset' => $data->firstItem(),
            'endOffset' => $data->lastItem(),
            'totalItems' => $data->total(),
        ];
    }
}
