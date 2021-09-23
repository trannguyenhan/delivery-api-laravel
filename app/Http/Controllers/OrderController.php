<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderCreateRequest;
use App\Http\Requests\Order\UpdateStatusOrderRequest;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function list(Request $request){
        return $this->doList($request);
    }

    public function create(OrderCreateRequest $request){
        return $this->doCreate($request, \App\Models\Order::INSERT_FIELDS);
    }

    public function accept(UpdateStatusOrderRequest $request){
        return $this->repository->accept($request);
    }


}
