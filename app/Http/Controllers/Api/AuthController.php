<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponser;



    public function login(LoginRequest $request){
        $credentials = $request->validated();
        
        if(!Auth::attempt($credentials)){
            return $this->errorResponse([
                "message" => "Credentials do not match!",
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return $this->successResponse([
            "user" => $user,
            "token" => $token
        ]);
    }

    public function register(RegisterRequest $request){
        $data = $request->validated();
        $data["password"] = Hash::make($data["password"]);
        $user = User::create($data);

        $token = $user->createToken('main'. $user->first_name)->plainTextToken;

        return $this->successResponse([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request){
        // Auth::user()->currentAccessToken()->delete();
        // $request->user()->currentAccessToken()->delete();
        return response(Auth::user()->id, 200);
    }
}
