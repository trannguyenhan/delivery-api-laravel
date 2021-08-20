<?php

namespace App\Http\Controllers;

use App\Constants\Code;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Login via email and password
     */
    public function login(LoginRequest $request){
        // validate information login
        $request->validated();

        // get information login
        $credentials = $request->only('email', 'password');

        if(! $token = auth()->attempt($credentials)){
            return response()->json([
                'message' => 'Login fail!',
                'code' => Code::ERROR
            ]);
        }

        // if success return information user and token
        return response()->json([
            'message' => 'Login successfully!',
            'access_token' => $token,
            'user' => auth()->user()
        ]);
    }

    /**
     * Register new user
     */
    public function register(RegisterRequest $request){
        // validate information login
        $request->validated();

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        return response()->json([
            'message' => 'create account successfully',
            'user' => $user
        ]);
    }

    /**
     * Profile
     */
    public function profile(){
        return response()->json(auth()->user());
    }

    /**
     * Logout
     */
    public function logout(){
        auth()->logout(); // delete token

        return response()->json([
            'message' => 'logout successfully',
        ]);
    }
}
