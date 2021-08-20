<?php

namespace App\Http\Controllers;

use App\Constants\Code;
use App\Http\Requests\UpdateStatusFoodRequest;
use App\Models\Order;
use App\Repositories\OrderEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    protected $userRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderEloquentRepository();
    }

    public function show(Request $request){
        return $this->orderRepository->show($request);
    }

    public function update(UpdateStatusFoodRequest $request){
        return $this->orderRepository->update($request);
    }
}
