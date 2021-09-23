<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends BaseRequest
{
    protected $regex = [
        'user_id' => 'required|exists:users,id',
        'address' => 'required',
        'food_id' => 'required|exists:foods,id',
        'quantity' => 'required'
    ];
}
