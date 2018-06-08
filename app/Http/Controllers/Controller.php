<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Returns a normal response for successful requests
     *
     * @param $object
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function normalResponse($object, $message) {

        return response()->json([
            'code'=>200,
            'data' => $object,
            'message' => $message
        ]);
    }

    public function paginatedResponse($object) {

    }
}
