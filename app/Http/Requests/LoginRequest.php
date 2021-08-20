<?php

namespace App\Http\Requests;

class LoginRequest extends InputRequest
{
    protected $regex = [
        'email' => 'required|email|string',
        'password' => 'required',
    ];
}
