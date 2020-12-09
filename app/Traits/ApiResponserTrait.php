<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;


trait ApiResponserTrait
{
    protected function successResponsePaginate($data, $message = null, $code = 200)
    {
        return response()->json([
            'status'=> 'success', 
            'message' => $message, 
            'data' => $data['data'],
            'meta' => [
                'current_page' => $data['current_page'],
                'last_page' => $data['last_page'],
                'per_page' => $data['per_page'],
                'to' => $data['to'],
                'total' => $data['total'],
                'from' => $data['from'],
                'path' => $data['path'],
                'first_page_url' => $data['first_page_url'],
                'next_page_url' => $data['next_page_url']
            ]
        ], $code);
    }


    protected function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'status'=> 'success', 
            'message' => $message, 
            'data' => $data
        ], $code);
    }


    protected function errorResponse($message = null, $code)
    {
        return response()->json([
            'status'=>'error',
            'message' => $message,
            'data' => null
        ], $code);
    }
}