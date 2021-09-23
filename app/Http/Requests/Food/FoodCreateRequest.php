<?php

namespace App\Http\Requests\Food;

use App\Http\Requests\BaseRequest;

class FoodCreateRequest extends BaseRequest
{
    protected $regex = [
        'name' => 'required|unique:foods,name',
        'price' => 'required',
    ];
}
