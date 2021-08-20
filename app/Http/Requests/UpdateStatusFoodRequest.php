<?php

namespace App\Http\Requests;

class UpdateStatusFoodRequest extends InputRequest
{
    protected $regex = [
        'name' => 'required|string',
        'status' => 'required',
    ];
}
