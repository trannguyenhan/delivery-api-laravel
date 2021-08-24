<?php

namespace App\Http\Requests;

class FoodCreateRequest extends InputRequest
{
    protected $regex = [
        'id' => 'required',
        'quantity' => 'required',
        'address' => 'required|string'
    ];
}
