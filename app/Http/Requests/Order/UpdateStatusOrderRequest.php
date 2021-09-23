<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;

class UpdateStatusOrderRequest extends BaseRequest
{
    protected $regex = [
        'id' => 'required|string',
        'status' => 'required',
    ];
}
