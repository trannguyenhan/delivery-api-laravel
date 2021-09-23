<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Login via email and password
     */
    public function login(LoginRequest $request){
        // get information login
        $credentials = $request->only('email', 'password');

        if(! $token = auth()->attempt($credentials)){
            return \App\Helper::errorResponse("Login fail! email or password incorrect");
        }

        // if success return information user and token
        return \App\Helper::successResponseWithToken($token);
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

        return \App\Helper::successResponse($user);
    }

    /**
     * Profile
     */
    public function profile(){
        if(!auth()->check()){
            return \App\Helper::errorResponse("Fail! You need login!");
        }

        return \App\Helper::successResponse(auth()->user());
    }

    /**
     * Logout
     */
    public function logout(){
        auth()->logout(); // delete token
        return \App\Helper::successResponse();
    }
}
