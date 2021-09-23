<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    protected $regex = [
        'name' => 'required|string',
        'email' => 'required|email|string',
        'password' => 'required',
    ];
}
