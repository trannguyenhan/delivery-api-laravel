<?php

namespace App\Http\Requests\Auth;
use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    protected $regex = [
        'email' => 'required|email|string',
        'password' => 'required',
    ];
}
