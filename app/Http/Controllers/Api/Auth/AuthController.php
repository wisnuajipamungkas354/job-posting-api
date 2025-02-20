<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterCompanyRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The credentials you entered are incorrect.']
            ]);
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('laravel_api_token')->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->getData());

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('laravel_api_token')->plainTextToken
        ]);
    }

    public function registerCompany(RegisterCompanyRequest $request) {
        $data = $request->getData();

        $path = $request->file('image_url')->store('companylogo', 'public');

        $user = User::create([
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
            'status' => $data['status']
        ]);

        Company::create([
            'user_id' => $user->id,
            'company_name' => $data['company_name'],
            'company_category' => $data['company_category'],
            'company_description' => $data['company_description'],
            'company_address' => $data['company_address'],
            'total_employee' => $data['total_employee'],
            'image_url' => $path,
        ]);
        
        return $this->sendResponse('Registrasi berhasil', 201);
    }

    public function addGeneralUser(GeneralRequest $request)
    {

    }
}
