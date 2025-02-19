<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function sendResponse($message, $code = 200, $data = null) {
        $response = [
            'status' => 'success',
            'message' => $message,
        ];

        if($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    public function sendError($message, $code = 404, $errors = null) {
        $response = [
            'status' => 'error',
            'message' => $message,
        ];

        if($errors !== null) {
            $response['errorMessage'] = $errors;
        }

        return response()->json($response, $code);
    }
}
