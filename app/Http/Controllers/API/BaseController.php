<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function SendResponse($result, $message)
    {
        $response = [
            'data' => $result,
            'success'=> true,
            'message' => $message
        ];

        return response()->json($response , 200);
    }

    public function SendError($error, $message = [])
    {
        $response = [
            'success' => false,
            'message' => $error
        ];
        if(!empty($message))
            $response['data'] = $message;
        
        return response()->json($response, 404);   
    }
}
