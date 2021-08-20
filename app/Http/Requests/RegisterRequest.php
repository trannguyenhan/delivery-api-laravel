<?php

namespace App\Http\Requests;

class RegisterRequest extends InputRequest
{
    protected $regex = [
        'name' => 'required|string',
        'email' => 'required|email|string',
        'password' => 'required',
    ];
}
