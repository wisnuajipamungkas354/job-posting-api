<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\General;

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

    public function getUserProfile() {
        $user = [];

        if(auth()->user()->role === 'company') {
            $user = Company::query()->where('user_id', '=', auth()->user()->id)->first(['id', 'company_name', 'company_category']);
        } elseif(auth()->user()->role === 'general') {
            $user = General::query()->where('user_id', '=', auth()->user()->id)->first(['id', 'full_name', 'gender']);
        }

        return $user;
    }
}
